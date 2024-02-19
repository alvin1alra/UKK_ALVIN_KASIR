<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    // Menampilkan semua data pelanggan
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', ['pelanggan' => $pelanggan]);
    }

    // Menampilkan formulir untuk menambahkan pelanggan baru
    public function create()
    {
        return view('pelanggan.create');
    }

    // Menyimpan data pelanggan yang baru ditambahkan
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        // Simpan data pelanggan
        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    // Menampilkan detail pelanggan
    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.show', ['pelanggan' => $pelanggan]);
    }

    // Menampilkan formulir untuk mengedit data pelanggan
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', ['pelanggan' => $pelanggan]);
    }

    // Menyimpan perubahan pada data pelanggan yang diedit
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        // Simpan perubahan data pelanggan
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    // Menghapus data pelanggan
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil dihapus.');
    }
}