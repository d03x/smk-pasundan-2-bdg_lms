<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matpel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MatpelController extends Controller
{
    public function index(Request $request)
    {
        $query = Matpel::query();
        if ($request->search) {
            $query->where('nama', 'like', "%{$request->search}%")
                ->orWhere('kode', 'like', "%{$request->search}%");
        }

        return inertia('admin/matpel/index', [
            'matpels' => $query->latest()->paginate(10)->withQueryString(),
            'filters' => $request->only(['search'])
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:matpels,kode',
            'nama' => 'required|string|max:255',
            'kelompok' => 'nullable|string' // misal: Muatan Nasional, Kejuruan, dll
        ]);

        Matpel::create($request->all());

        return back()->with('success', 'Mata Pelajaran berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $matpel = Matpel::findOrFail($id);

        $request->validate([
            'kode' => [
                'required',
                Rule::unique('matpels', 'kode')->ignore($matpel->id),
            ],
            'nama' => 'required|string|max:255',
            'kelompok' => 'nullable|string'
        ]);

        $matpel->update($request->all());

        return back()->with('success', 'Mata Pelajaran berhasil diperbarui');
    }

    public function destroy($id)
    {
        Matpel::findOrFail($id)->delete();
        return back()->with('success', 'Mata Pelajaran berhasil dihapus');
    }
}
