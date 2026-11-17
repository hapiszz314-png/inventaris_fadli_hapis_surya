<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi input dari form
        $request->validate([
            'nama_barang'   => 'required|string|max:255',
            'kategori'      => 'required|string',
            'kondisi'       => 'required|string',
            'jumlah'        => 'required|integer|min:0',
            'lokasi'        => 'required|string|max:255',
            'tanggal_masuk' => 'nullable|date',
        ]);

        // 2. Ambil semua data request dan generate kode_barang secara otomatis
        $data = $request->all();
        $data['kode_barang'] = 'BRG-' . strtoupper(substr(md5(mt_rand()), 0, 6)); 

        // 3. Simpan data ke database
        Barang::create($data);

        // 4. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('barang.index')
            ->with('success', 'Data Barang Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang): View
    {
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang): View
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang): RedirectResponse
    {
        $request->validate([
            'nama_barang'   => 'required|string|max:255',
            'kategori'      => 'required|string',
            'kondisi'       => 'required|string',
            'jumlah'        => 'required|integer|min:0',
            'lokasi'        => 'required|string|max:255',
            'tanggal_masuk' => 'nullable|date',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')
            ->with('success', 'Data Barang Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang): RedirectResponse
    {
        // Menghapus data dari database
        $barang->delete();

        return redirect()->route('barang.index')
            ->with('success', 'Data Barang Berhasil Dihapus');
    }
}