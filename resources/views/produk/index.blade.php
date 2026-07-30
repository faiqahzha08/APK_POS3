@extends('layouts.app')

@section('title', 'Produk - POS')

@section('content')

<!-- Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl sm:text-3xl font-bold text-slate-900">
            Daftar Produk
        </h1>

        <p class="text-sm text-slate-500 mt-1">
            Kelola semua produk yang tersedia di toko
        </p>
    </div>

    <a href="{{ route('produk.create') }}"
        class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl">

        <i data-lucide="plus" class="w-4 h-4"></i>

        Tambah Produk

    </a>

</div>

<!-- Search -->
<div class="bg-white rounded-2xl shadow border border-slate-200 p-5 mb-6">

    <form method="GET" action="{{ route('produk.index') }}"
        class="flex flex-col sm:flex-row gap-3">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari produk..."
            class="flex-1 border rounded-xl px-4 py-2">

        <select
            name="stok"
            class="border rounded-xl px-4 py-2">

            <option value="">Semua Stok</option>

            <option value="aman"
                {{ request('stok')=='aman' ? 'selected' : '' }}>
                Aman
            </option>

            <option value="rendah"
                {{ request('stok')=='rendah' ? 'selected' : '' }}>
                Rendah
            </option>

            <option value="habis"
                {{ request('stok')=='habis' ? 'selected' : '' }}>
                Habis
            </option>

        </select>

        <button
            class="bg-slate-800 text-white rounded-xl px-5">

            Filter

        </button>

    </form>

</div>

<!-- Table -->

<div class="bg-white rounded-2xl shadow border border-slate-200 overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full text-sm">

            <thead>

                <tr class="bg-slate-50 border-b">

                    <th class="px-6 py-3 text-left">#</th>

                    <th class="px-6 py-3 text-left">
                        Foto
                    </th>

                    <th class="px-6 py-3 text-left">
                        Nama Produk
                    </th>

                    <th class="px-6 py-3 text-left">
                        Harga Beli
                    </th>

                    <th class="px-6 py-3 text-left">
                        Harga Jual
                    </th>

                    <th class="px-6 py-3 text-center">
                        Stok
                    </th>

                    <th class="px-6 py-3 text-right">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y">

                @forelse($produks as $index=>$produk)

                <tr class="hover:bg-slate-50">

                    <td class="px-6 py-4">

                        {{ $produks->firstItem()+$index }}

                    </td>

                    <td class="px-6 py-4">

                        @if($produk->foto)

                            <img
                                src="{{ asset('storage/'.$produk->foto) }}"
                                class="w-16 h-16 rounded-xl object-cover border">

                        @else

                            <div
                                class="w-16 h-16 rounded-xl border bg-slate-100 flex items-center justify-center text-xs text-slate-500">

                                No Image

                            </div>

                        @endif

                    </td>

                    <td class="px-6 py-4">

                        <div class="font-semibold">

                            {{ $produk->nama }}

                        </div>

                    </td>

                    <td class="px-6 py-4">

                        Rp {{ number_format($produk->harga_beli,0,',','.') }}

                    </td>

                    <td class="px-6 py-4 font-semibold text-green-600">

                        Rp {{ number_format($produk->harga_jual,0,',','.') }}

                    </td>

                    <td class="px-6 py-4 text-center">

                        @if($produk->stok==0)

                            <span
                                class="px-3 py-1 rounded-full bg-red-100 text-red-600 text-xs">

                                Habis

                            </span>

                        @elseif($produk->stok<10)

                            <span
                                class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs">

                                {{ $produk->stok }}

                            </span>

                        @else

                            <span
                                class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">

                                {{ $produk->stok }}

                            </span>

                        @endif

                    </td>

                    <td class="px-6 py-4">

                        <div class="flex justify-end gap-2">

                            {{-- Detail --}}
                            <a
                                href="{{ route('produk.show',$produk->id) }}"
                                class="p-2 rounded-lg bg-blue-100 hover:bg-blue-200">

                                <i data-lucide="eye"
                                    class="w-4 h-4 text-blue-700"></i>

                            </a>

                            {{-- Edit --}}
                            <a
                                href="{{ route('produk.edit',$produk->id) }}"
                                class="p-2 rounded-lg bg-yellow-100 hover:bg-yellow-200">

                                <i data-lucide="pencil"
                                    class="w-4 h-4 text-yellow-700"></i>

                            </a>

                            {{-- Hapus --}}
                            <form
                                action="{{ route('produk.destroy',$produk->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="p-2 rounded-lg bg-red-100 hover:bg-red-200">

                                    <i
                                        data-lucide="trash-2"
                                        class="w-4 h-4 text-red-700"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7"
                        class="text-center py-10 text-slate-500">

                        Belum ada produk

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="p-5 border-t">

        {{ $produks->links() }}

    </div>

</div>

@endsection