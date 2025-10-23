@extends('layouts.layoutUtama')

@section('content')
<div class="max-w-6xl mx-auto px-8 mt-10 mb-16">
    <div class="bg-white shadow-xl rounded-2xl p-8 border border-emerald-100">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h2 class="text-3xl font-extrabold text-emerald-700">Pengelolaan Data Pupuk</h2>
                <p class="text-gray-600 mt-2">Kelola stok, jenis, dan harga pupuk pertanian dengan mudah.</p>
            </div>
            <a href="{{ route('pupuk.formTambah') }}" 
                class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg shadow-md transition">
                + Tambah Pupuk
            </a>


        </div>

        <div class="relative mb-6">
            <input type="text" placeholder="Cari nama pupuk..." 
                class="w-full border rounded-xl px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-emerald-500"
                id="searchInput">
            <svg class="w-5 h-5 absolute top-3 left-3 text-emerald-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35M9 17a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
        </div>

        <div class="overflow-x-auto rounded-lg">
            <table class="min-w-full bg-white text-sm border border-gray-200 rounded-xl">
                <thead>
                    <tr class="bg-emerald-100 text-emerald-800 text-left uppercase text-xs tracking-wider">
                        <th class="px-4 py-3">Nama Pupuk</th>
                        <th class="px-4 py-3">Jenis / Penjelasan</th>
                        <th class="px-4 py-3 text-center">Stok</th>
                        <th class="px-4 py-3 text-center">Harga (Rp)</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 divide-y divide-gray-100">
                    @foreach ($dataPupuk as $pupuk)
                        <tr class="hover:bg-emerald-50 transition">
                            <td class="px-4 py-3 font-semibold">{{ $pupuk['nama_pupuk'] }}</td>
                            <td class="px-4 py-3">{{ $pupuk['penjelasan'] }}</td>
                            <td class="px-4 py-3 text-center">
                                @php
                                    $stok = $pupuk['jumlah'];
                                    $warna = $stok < 60 ? 'bg-red-100 text-red-600' : ($stok < 100 ? 'bg-yellow-100 text-yellow-700' : 'bg-emerald-100 text-emerald-700');
                                    $label = $stok < 60 ? 'Rendah' : ($stok < 100 ? 'Sedang' : 'Tinggi');
                                @endphp
                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $warna }}">
                                    {{ $stok }} ({{ $label }})
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center font-medium text-gray-800">
                                Rp{{ number_format($pupuk['harga'], 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-2 text-center flex justify-center space-x-3">
                            <a href="{{ route('pupuk.formEdit', $pupuk['id']) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-[10px] shadow-md">
                                Edit
                            </a>
                            <form action="{{ route('pupuk.hapus', $pupuk['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-[10px] shadow-md">
                                    Hapus
                                </button>
                            </form>
                        </td>

                        </tr>
                    @endforeach

                    @if (count($dataPupuk) === 0)
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500">Tidak ada data pupuk saat ini.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Script pencarian lokal sederhana --}}
<script>
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keyup', function() {
        const filter = searchInput.value.toLowerCase();
        document.querySelectorAll('tbody tr').forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection
