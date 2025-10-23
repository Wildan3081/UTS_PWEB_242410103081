@extends('layouts.layoutUtama')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-emerald-50 to-green-100 py-12 px-6">
    <div class="max-w-6xl mx-auto">

        <div class="text-left mb-12">
            <h2 class="text-4xl font-extrabold text-emerald-700">Selamat Datang,</h2>
            <p class="text-5xl font-semibold text-gray-700 mt-3">
                <strong>{{ request()->query('username') }}</strong>
            </p>
            <p class="mt-4 text-gray-600 text-lg max-w-3xl">
                Senang bertemu kembali di <span class="font-semibold text-emerald-700">PupukKu</span>,
                sistem pengelolaan pupuk pertanian modern untuk membantu petani, distributor, 
                dan pengelola gudang dalam memantau stok pupuk secara efisien.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8 items-center bg-white rounded-2xl shadow-xl p-8 border border-emerald-100">
            <div>
                <h3 class="text-2xl font-bold text-emerald-700 mb-4">Tentang <span class="text-green-600">PupukKu</span></h3>
                <p class="text-gray-700 leading-relaxed mb-4">
                    <strong>PupukKu</strong> hadir untuk memudahkan pengelolaan berbagai jenis pupuk seperti 
                    Urea, ZA, SP-36, NPK, dan pupuk organik. Dengan fitur yang Mudah dan cepat, 
                    pengguna dapat:
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li>Melihat data stok dan jenis pupuk secara real-time.</li>
                    <li>Menambah, mengedit, atau menghapus data pupuk dengan mudah.</li>
                </ul>
            </div>

            <div class="flex justify-center">
                <img 
                    src="https://storage.googleapis.com/pkg-portal-bucket/images/news/2019-03/pupuk-organik-demi-keberlanjutan-pertanian/pg_pupuk-petroganik.jpg" 
                    alt="pupuk" 
                    class="w-64 h-64 object-contain p-4 bg-emerald-50 rounded-2xl shadow-inner border border-emerald-100 hover:scale-105 transition-transform duration-300"
                >
            </div>
        </div>

\        <div class="mt-12 text-center">
            <h4 class="text-2xl font-bold text-emerald-700 mb-4">Mari Wujudkan Pertanian yang Lebih Produktif</h4>
            <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Dengan pengelolaan pupuk yang baik, hasil pertanian akan lebih maksimal dan berkelanjutan. 
                Gunakan <strong>PupukKu</strong> untuk membantu mengatur stok serta memantau penggunaan  pupuk agar pertanian semakin subur dan efisien.
            </p>
            <a href="{{ route('pengelolaan', request()->only('username')) }}" 
               class="inline-block mt-8 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition-all duration-200">
                Kelola Data Pupuk Sekarang
            </a>
        </div>

    </div>
</div>
@endsection
