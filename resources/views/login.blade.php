@extends('layouts.loginlayout')

@section('content')
<div class="relative w-full flex items-center justify-center min-h-screen">
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-100 via-green-50 to-emerald-200 -z-10"></div>
    <div class="flex flex-col items-center w-full max-w-md px-6 relative z-10">
        <div class="text-center mb-10">
            <img src="http://ap-simpel.pertanian.go.id/assets/images/kementan_logo.png" alt="Logo PupukKu"
                 class="w-20 h-20 mx-auto mb-4 animate-bounce">
            <h1 class="text-4xl font-extrabold text-emerald-700 tracking-wide">PupukKu</h1>
            <p class="text-gray-600 mt-2">Sistem Informasi Pengelolaan Pupuk Pertanian</p>
        </div>

        <div class="bg-white rounded-2xl shadow-2xl p-10 w-full transform transition duration-300 hover:scale-[1.02]">
            <form method="POST" action="{{ route('login.tekan') }}" class="w-full">
                @csrf
                <h2 class="text-2xl font-bold mb-8 text-center text-emerald-700">Masuk ke Akun Anda</h2>
                <div class="mb-6">
                    <label for="username" class="block font-medium text-gray-700 text-md mb-2">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username..."
                        class="w-full border border-gray-300 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block font-medium text-gray-700 text-md mb-2">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password..."
                        class="w-full border border-gray-300 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
                </div>
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 text-sm text-center">
                        {{ session('error') }}
                    </div>
                @endif
                <button type="submit"
                    class="w-full bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-3 rounded-xl font-semibold shadow-md transition duration-200">
                    Masuk
                </button>
                <p class="text-center text-sm text-gray-500 mt-6">
                    © {{ date('Y') }} <span class="font-semibold text-emerald-700">PupukKu</span> | Pertanian Cerdas 
                </p>
            </form>
        </div>

    </div>
</div>
@endsection
