@php
    $username = request()->query('username');
@endphp

<header class="shadow-md py-4 bg-gradient-to-r from-emerald-700 to-green-700">
    <div class="container mx-auto flex items-center justify-between px-8">
        <div class="flex items-center space-x-3">
            <img src="http://ap-simpel.pertanian.go.id/assets/images/kementan_logo.png" 
                 alt="Logo PupukKu" 
                 class="w-10 h-10 drop-shadow-md">
            <h1 class="text-2xl font-bold text-lime-200 tracking-wide hover:text-white transition">
                PupukKu
            </h1>
        </div>
        <div class="flex items-center space-x-6 text-white text-sm font-medium">
            <button
                onclick="window.location='{{ route('dashboard', ['username' => session('user')['username']]) }}'"
                class="hover:text-lime-200 transition duration-200">
                Dashboard
            </button>
            <button
                onclick="window.location='{{ route('pengelolaan', ['username' => session('user')['username']]) }}'"
                class="hover:text-lime-200 transition duration-200">
                Kelola Pupuk
            </button>
            <button
                onclick="window.location='{{ route('profil', ['username' => session('user')['username']]) }}'"
                class="hover:text-lime-200 transition duration-200">
                Profil
            </button>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="ml-4 bg-red-600 hover:bg-red-700 text-white px-4 py-1.5 rounded-lg shadow-md transition duration-200 flex items-center space-x-1">
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</header>
