@extends('layouts.layoutUtama')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-emerald-50 via-green-50 to-emerald-100 py-16 px-6">
    <div class="max-w-5xl mx-auto">
        <div class="text-left mb-12">
            <h2 class="text-3xl font-extrabold text-emerald-700">Selamat Datang,</h2>
            <p class="text-4xl mt-1 text-gray-700 font-semibold">
                <strong>{{ request()->query('username') }}</strong>
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-10 flex flex-col md:flex-row items-center md:items-start gap-10 border border-emerald-100 hover:shadow-2xl transition duration-300">
                        <div class="relative">
                <div class="w-40 h-40 rounded-full bg-emerald-600 flex items-center justify-center text-white text-6xl font-bold shadow-lg border-4 border-white">
                    {{ strtoupper(substr($user['nama'], 0, 1)) }}
                </div>
                <img src="http://ap-simpel.pertanian.go.id/assets/images/kementan_logo.png" 
                     alt="Pupuk" 
                     class="w-10 h-10 absolute bottom-1 right-1 bg-white rounded-full border border-emerald-300 p-1 shadow-md">
            </div>
            <div class="flex-1">
                <h3 class="text-2xl font-bold mb-4 text-emerald-700">Profil Pengguna</h3>
                <div class="space-y-3 text-lg text-gray-800">
                    <p><strong>Nama:</strong> {{ $user['nama'] }}</p>
                    <p><strong>Username:</strong> {{ $user['username'] }}</p>
                    <p><strong>Email:</strong> {{ $user['email'] }}</p>
                    <p><strong>No HP:</strong> {{ $user['no_hp'] }}</p>
                </div>
            </div>
            <div class="w-full md:w-48 flex justify-center md:justify-end">
                <a href="{{ route('profil.formEdit') }}"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition duration-300">
                        Edit Profil
                </a>

            </div>
        </div>
        <div class="mt-12 text-center text-gray-600">
            <p class="text-sm">
                <strong>PupukKu</strong> — Bersama kita wujudkan pertanian yang lebih hijau dan berkelanjutan.
            </p>
        </div>
    </div>
</div>
@endsection
