<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ItemPenjualan;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index(Request $request)
{
    $query = Produk::query();

    if ($request->filled('search')) {
        $query->where('nama', 'like', '%' . $request->search . '%');
    }

    if ($request->stok == 'aman') {
        $query->where('stok', '>=', 10);
    }

    if ($request->stok == 'rendah') {
        $query->whereBetween('stok', [1, 9]);
    }

    if ($request->stok == 'habis') {
        $query->where('stok', 0);
    }

    $produks = $query->latest()->paginate(10);

    return view('produk.index', compact('produks'));
}

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('produk', 'public');
        }

        Produk::create([
            'user_id' => Auth::id(),
            'foto' => $foto,
            'nama' => $request->nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
        ]);

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);

        return view('produk.show', compact('produk'));
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);

        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama' => 'required|max:255',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = $produk->foto;

        if ($request->hasFile('foto')) {

            if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
                Storage::disk('public')->delete($produk->foto);
            }

            $foto = $request->file('foto')->store('produk', 'public');
        }

        $produk->update([
            'foto' => $foto,
            'nama' => $request->nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
        ]);

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil diupdate.');
    }

    public function destroy($id)
{
    $produk = Produk::findOrFail($id);

    // Cek apakah produk sudah pernah dipakai transaksi
    if (ItemPenjualan::where('produk_id', $produk->id)->exists()) {
        return redirect()
            ->route('produk.index')
            ->with('error', 'Produk tidak dapat dihapus karena sudah digunakan pada transaksi.');
    }

    if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
        Storage::disk('public')->delete($produk->foto);
    }

    $produk->delete();

    return redirect()
        ->route('produk.index')
        ->with('success', 'Produk berhasil dihapus.');
}
}