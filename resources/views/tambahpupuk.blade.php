@extends('layouts.layoutUtama')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-8 mt-12">
    <h2 class="text-2xl font-bold text-emerald-700 mb-6">Tambah Data Pupuk</h2>

    <form method="POST" action="{{ route('pupuk.tambah') }}">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold text-gray-700 mb-2">Nama Pupuk</label>
            <input type="text" name="nama_pupuk" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold text-gray-700 mb-2">Penjelasan</label>
            <textarea name="penjelasan" class="w-full border rounded px-3 py-2" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold text-gray-700 mb-2">Jumlah (Stok)</label>
            <input type="number" name="jumlah" min="1" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold text-gray-700 mb-2">Harga (Rp)</label>
            <input type="number" name="harga" min="0" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('pengelolaan') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-lg shadow">
                Kembali
            </a>
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-lg shadow">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
