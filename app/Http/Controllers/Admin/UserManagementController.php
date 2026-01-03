<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\EmailGenerator;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Matpel;
use App\Models\Pengajaran;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UserManagementController extends Controller
{
    public function destroySiswa($id)
    {
        try {
            $siswa = Siswa::where('nis', $id)->firstOrFail();
            $user = $siswa->user; // Ambil relasi user sebelum siswa dihapus

            // 1. Hapus Foto jika ada (Opsional, bersihkan storage)
            if ($siswa->pas_photo) {
                Storage::disk('public')->delete($siswa->pas_photo);
            }

            // 2. Coba Hapus Siswa
            // Jika siswa terpakai di tabel lain (cth: tabel_nilai), 
            // database akan melempar error QueryException karena Foreign Key.
            $siswa->delete();

            // 3. Hapus Akun User login terkait (jika desainnya 1 siswa = 1 user)
            if ($user) {
                $user->delete();
            }

            return back()->with('success', 'Data siswa dan akun berhasil dihapus.');
        } catch (QueryException $e) {
            // Error Code 23000 adalah integrity constraint violation (Foreign Key)
            if ($e->getCode() == "23000") {
                return back()->with('error', 'Gagal menghapus! Siswa ini masih memiliki data terkait (Nilai/Absensi/dll).');
            }

            return back()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }
    public function editSiswa(string $id)
    {
        $siswa = Siswa::with('user')->findOrFail($id);

        $kelasList = Kelas::select('id', 'nama', 'tingkat')->get();
        return Inertia::render('admin/user-management/siswa/edit', [
            'siswa'     => $siswa,
            'kelasList' => $kelasList
        ]);
    }
    public function updateSiswa(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'name'          => 'required',
            'nis'           => ['required'],
            'agama'         => 'required',
            'tahun_masuk'   => 'required',
            'tingkat'       => 'required',
            'kelas_id'      => 'required',
            'status'        => 'required',
            'pas_photo'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        DB::transaction(function () use ($request, $siswa) {
            $siswa->user->update([
                'name' => $request->name
            ]);

            if ($request->hasFile('pas_photo')) {
                if ($siswa->pas_photo && $siswa->pas_photo !== 'siswa.png' && Storage::disk('public')->exists($siswa->pas_photo)) {
                    Storage::disk('public')->delete($siswa->pas_photo);
                }

                $photoPath = $request->file('pas_photo')->store('siswa-photos', 'public');
                $siswa->pas_photo = $photoPath;
            }

            $siswa->update([
                'nis'           => $request->nis,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama'         => $request->agama,
                'tahun_masuk'   => $request->tahun_masuk,
                'tingkat'       => $request->tingkat,
                'kelas_id'      => $request->kelas_id,
                'status'        => $request->status,
            ]);
        });

        return to_route('admin.user-management.siswa')->with('success', 'Data siswa berhasil diperbarui');
    }
    public function tambahGuru()
    {
        $matpels = \App\Models\Matpel::select('kode', 'nama')->orderBy('nama')->get();
        return inertia('admin/user-management/guru/tambah', [
            'matpels' => $matpels,
        ]);
    }
    public function index()
    {
        return inertia('admin/user-management/index');
    }
    public function simpanGuru(Request $request)
    {
        $request->validate([
            'nip'            => 'required|unique:gurus,nip|numeric',
            'name'           => 'required|string|max:255',
            'jenis_kelamin'  => 'required|in:L,P',
            'status'         => 'required',
            'foto'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gelar_depan'    => 'nullable|string|max:50',
            'gelar_belakang' => 'nullable|string|max:50',
            'matpel_kode'    => 'nullable|exists:matpels,kode',
        ]);

        $user = DB::transaction(function () use ($request) {


            $emailGenerated = EmailGenerator::generateEmailDomain($request->nip);
            $passwordRaw = $request->nip . "-" . Carbon::now()->format("Y");

            $userData = [
                'name'     => $request->name,
                'email'    => $emailGenerated,
                'password' => Hash::make($passwordRaw),
            ];

            $user = User::create($userData);

            $photoPath = null;
            if ($request->hasFile('foto')) {
                $photoPath = $request->file('foto')->store('guru-photos', 'public');
            }

            Guru::create([
                'nip'            => $request->nip,
                'user_id'        => $user->id,
                'gelar_depan'    => $request->gelar_depan,
                'gelar_belakang' => $request->gelar_belakang,
                'jenis_kelamin'  => $request->jenis_kelamin,
                'status'         => strtolower($request->status), // Ubah ke huruf kecil (aktif/nonaktif) agar seragam
                'foto'           => $photoPath,
                'matpel_kode'    => $request->matpel_kode, // <--- INPUT DARI SELECT VUE
            ]);

            return $user; // Return object user untuk pengecekan di bawah
        });

        // 3. Return Response
        if ($user) {
            // Tampilkan password default di notifikasi agar admin tahu
            $passwordDefault = $request->nip . "-" . Carbon::now()->format("Y");

            return back()->with([
                'success' => "Data Guru berhasil ditambahkan. Password default: " . $passwordDefault
            ]);
        }

        return back()->withErrors([
            'message' => "Gagal menambahkan data guru."
        ]);
    }
    public function simpanSiswa(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis', // Asumsi NIS jadi basis unique
            'pas_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maks 2MB
            'name' => 'required',
            'agama' => 'required',
            "tahun_masuk" => ['required'],
            'tingkat' => ['required'],
            'kelas_id' => ['required'],
            'status' => ['required'],
        ]);
        $user =   DB::transaction(function () use ($request) {
            $emailGenerated = EmailGenerator::generateEmailDomain($request->nis);
            $password = $request->nis . "-" . Carbon::now()->format("Y");
            $user = [
                'name' => $request->name,
                'email' => $emailGenerated,
                'password' => $password,
            ];
            $user =  User::create($user);
            $photoPath = 'siswa.png';
            if ($request->hasFile('pas_photo')) {
                $photoPath = $request->file('pas_photo')->store('siswa-photos', 'public');
            }
            return Siswa::create([
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'tahun_masuk' => $request->tahun_masuk,
                'tingkat' => $request->tingkat,
                'status' => strtolower($request->status),
                'user_id' => $user->id,
                'pas_photo' => $photoPath,
                'nis' => $request->nis,
                'kelas_id' => $request->kelas_id,
            ]);
        });
        if ($user) {
            return back()->with([
                'success' => "Data berhasil di tambahkan"
            ]);
        }
        return back()->withErrors([
            'success' => "Data berhasil di tambahkan"
        ]);
    }
    public function updateGuru(Request $request, string $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nip'            => ['required', 'numeric', Rule::unique('gurus', 'nip')->ignore($guru->nip, 'nip')],
            'name'           => 'required|string|max:255',
            'jenis_kelamin'  => 'required|in:L,P',
            'status'         => 'required|in:aktif,nonaktif,Aktif,Nonaktif',
            'foto'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gelar_depan'    => 'nullable|string|max:50',
            'gelar_belakang' => 'nullable|string|max:50',
            'matpel_kode'    => 'nullable|exists:matpels,kode',
        ]);

        DB::transaction(function () use ($request, $guru) {
            $guru->user->update([
                'name' => $request->name,
            ]);

            $photoPath = $guru->foto;
            if ($request->hasFile('foto')) {
                if ($guru->foto && $guru->foto !== 'guru-default.png' && Storage::disk('public')->exists($guru->foto)) {
                    Storage::disk('public')->delete($guru->foto);
                }
                $photoPath = $request->file('foto')->store('guru-photos', 'public');
            }

            $guru->update([
                'nip'            => $request->nip,
                'gelar_depan'    => $request->gelar_depan,
                'gelar_belakang' => $request->gelar_belakang,
                'jenis_kelamin'  => $request->jenis_kelamin,
                'status'         => strtolower($request->status), // Pastikan tersimpan huruf kecil
                'foto'           => $photoPath,
                'matpel_kode'    => $request->matpel_kode,
            ]);
        });

        return back()->with([
            'success' => "Data Guru {$request->name} berhasil diperbarui."
        ]);
    }
    public function editGuru(string $id)
    {
        $guru = Guru::with('user')->findOrFail($id);
        $matpels = \App\Models\Matpel::select('kode', 'nama')->orderBy('nama')->get();
        return inertia('admin/user-management/guru/edit', [
            'guru' => $guru,
            'matpels' => $matpels,
        ]);
    }
    public function siswa()
    {
        $user = User::whereHas('siswa')->paginate(5);
        return inertia('admin/user-management/siswa/index', ['users' => $user]);
    }
    public function tambahSiswa()
    {
        $kelas = Kelas::all();

        return inertia('admin/user-management/siswa/tambah', ['kelasList' => $kelas]);
    }

    public function guru(Request $request)
    {
        $query = User::query()->whereHas('guru');
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;

            $query->where(function (Builder $q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhereHas('guru', function (Builder $qGuru) use ($search) {
                        $qGuru->where('nip', 'like', "%{$search}%");
                    });
            });
        }

        $users = $query->with([
            'guru.matpels',
            'guru.pengajarans.kelas',
            'guru.spesialisMatpel',
            'guru.pengajarans.matpel'
        ])
            ->latest()
            ->paginate(4)
            ->withQueryString();

        $kelas = Kelas::all();
        $matpels = Matpel::all();

        return inertia('admin/user-management/guru/index', [
            'users'   => $users,
            'kelas'   => $kelas,
            'matpels' => $matpels,
            'filters' => $request->only(['search']),
        ]);
    }
    public function addMatpelToGuru(Request $request)
    {
        // 1. Validasi Input Basic
        $request->validate([
            'guru_nip'    => 'required|exists:gurus,nip',
            'matpel_kode' => 'required|exists:matpels,kode',
            'kelas_id'    => 'required|exists:kelas,id',
        ]);
        $existing = Pengajaran::with(['guru.user'])
            ->where('matpel_kode', $request->matpel_kode)
            ->where('kelas_id', $request->kelas_id)
            ->first();
        if ($existing) {
            if ($existing->guru_nip == $request->guru_nip) {
                return back()->withErrors([
                    'message' => 'Guru ini sudah terdaftar mengajar mata pelajaran tersebut di kelas ini.'
                ]);
            }
            $namaGuruLain = $existing->guru->user->nama ?? $existing->guru->nama ?? 'Guru Lain';
            return back()->withErrors([
                'message' => "Gagal! Mata pelajaran ini di kelas tersebut sudah diampu oleh guru: {$namaGuruLain}."
            ]);
        }
        Pengajaran::create([
            'guru_nip'    => $request->guru_nip,
            'matpel_kode' => $request->matpel_kode,
            'kelas_id'    => $request->kelas_id,
        ]);
        return back()->with('success', 'Penugasan berhasil ditambahkan.');
    }

    public function users(Request $request)
    {
        // Ambil user yang TIDAK punya relasi guru DAN TIDAK punya relasi siswa
        $query = User::query()->doesntHave('guru')->doesntHave('siswa');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->latest()->paginate(10)->withQueryString();

        return inertia('admin/user-management/users/index', [
            'users'   => $users,
            'filters' => $request->only(['search']),
        ]);
    }

    public function simpanUser(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            // Jika ada kolom role, tambahkan di sini: 'role' => 'admin'
        ]);

        return back()->with('success', 'Admin/Staff berhasil ditambahkan.');
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return back()->with('success', 'Data Admin/Staff berhasil diperbarui.');
    }
    public function createUser()
    {
        return inertia('admin/user-management/users/tambah');
    }
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return inertia('admin/user-management/users/edit', ['user' => $user]);
    }
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);

        if (auth()->id() == $user->id) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri saat sedang login.');
        }

        if ($user->guru || $user->siswa) {
            return back()->with('error', 'User ini terhubung dengan data Guru/Siswa. Gunakan menu Guru/Siswa untuk menghapus.');
        }

        $user->delete();

        return back()->with('success', 'Admin/Staff berhasil dihapus.');
    }
}
