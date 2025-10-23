@extends('layouts.layoutUtama')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-8 mt-12">
    <h2 class="text-2xl font-bold text-emerald-700 mb-6">Edit Profil Akun </h2>

    <form method="POST" action="{{ route('profil.edit') }}">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold text-gray-700 mb-2">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ $user['nama'] }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold text-gray-700 mb-2">Username</label>
            <input type="text" name="username" value="{{ $user['username'] }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold text-gray-700 mb-2">Email</label>
            <input type="email" name="email" value="{{ $user['email'] }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold text-gray-700 mb-2">No. HP</label>
            <input type="text" name="no_hp" value="{{ $user['no_hp'] }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('profil', ['username' => $user['username']]) }}" 
               class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-lg shadow">
                Kembali
            </a>
            <button type="submit" 
                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-lg shadow">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
