@extends('layouts.app')

@section('title','Edit Produk')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="mb-6">

        <a href="{{ route('produk.index') }}"
            class="text-slate-500 hover:text-indigo-600">

            ← Kembali

        </a>

        <h1 class="text-3xl font-bold mt-3">

            Edit Produk

        </h1>

    </div>

    <div class="bg-white rounded-2xl shadow p-6">

        <form
            action="{{ route('produk.update',$produk->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- FOTO LAMA --}}

            <div class="mb-6">

                <label class="block font-medium mb-2">

                    Foto Produk

                </label>

                @if($produk->foto)

                    <img
                        src="{{ asset('storage/'.$produk->foto) }}"
                        class="w-40 h-40 rounded-xl object-cover border mb-3">

                @endif

                <input
                    type="file"
                    name="foto"
                    accept="image/*"
                    onchange="previewImage(event)"
                    class="w-full border rounded-xl p-2">

                @error('foto')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                @enderror

                <img
                    id="preview"
                    class="hidden mt-3 w-40 h-40 rounded-xl border object-cover">

            </div>

            {{-- NAMA --}}

            <div class="mb-5">

                <label class="block font-medium mb-2">

                    Nama Produk

                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama',$produk->nama) }}"
                    class="w-full border rounded-xl p-3">

            </div>

            {{-- HARGA BELI --}}

            <div class="mb-5">

                <label class="block font-medium mb-2">

                    Harga Beli

                </label>

                <input
                    type="number"
                    name="harga_beli"
                    value="{{ old('harga_beli',$produk->harga_beli) }}"
                    class="w-full border rounded-xl p-3">

            </div>

            {{-- HARGA JUAL --}}

            <div class="mb-5">

                <label class="block font-medium mb-2">

                    Harga Jual

                </label>

                <input
                    type="number"
                    name="harga_jual"
                    value="{{ old('harga_jual',$produk->harga_jual) }}"
                    class="w-full border rounded-xl p-3">

            </div>

            {{-- STOK --}}

            <div class="mb-5">

                <label class="block font-medium mb-2">

                    Stok

                </label>

                <input
                    type="number"
                    name="stok"
                    value="{{ old('stok',$produk->stok) }}"
                    class="w-full border rounded-xl p-3">

            </div>

            <div class="flex gap-3">

                <button
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl">

                    Update

                </button>

                <a
                    href="{{ route('produk.index') }}"
                    class="bg-gray-300 px-6 py-3 rounded-xl">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

<script>

function previewImage(event){

    const reader = new FileReader();

    reader.onload = function(){

        let output=document.getElementById('preview');

        output.src=reader.result;

        output.classList.remove('hidden');

    }

    reader.readAsDataURL(event.target.files[0]);

}

</script>

@endsection