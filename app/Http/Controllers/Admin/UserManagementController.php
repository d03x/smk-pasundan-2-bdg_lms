<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\EmailGenerator;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Matpel;
use App\Models\Pengajaran;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserManagementController extends Controller
{
    public function tambahGuru(){
        return inertia('admin/user-management/guru/tambah');
    }
    public function index()
    {
        return inertia('admin/user-management/index');
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
    public function guru()
    {
        $user = User::query()->whereHas('guru')
            ->with(['guru.matpels', 'guru.pengajarans.kelas', 'guru.pengajarans.matpel'])
            ->paginate(4);
        $kelas = Kelas::all();
        $matpels = Matpel::all();
        return inertia('admin/user-management/guru/index', ['users' => $user, 'kelas' => $kelas, 'matpels' => $matpels]);
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
}
