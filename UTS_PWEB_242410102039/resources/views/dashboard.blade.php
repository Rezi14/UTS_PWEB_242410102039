@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="bg-teal-500 text-white p-8 rounded-lg shadow-md text-center mb-8">
        <h1 class="text-3xl font-bold">
            Selamat Datang, {{ ucfirst($username ?? 'Admin') }}!
        </h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 ">
        <a href="{{ route('pengelolaan', ['username' => $username]) }}"
            class="block bg-white p-6 rounded-lg shadow-md text-center
                   transition-all duration-200 ease-in-out
                   hover:shadow-lg hover:scale-[1.02] hover:bg-gray-800 group">
            <h3 class="text-lg font-medium text-gray-500 transition-colors group-hover:text-white">Total Kamar</h3>
            <p class="mt-2 text-4xl font-bold text-teal-500">{{ $totalkamar }}</p>
        </a>

        <div class="bg-white p-6 rounded-lg shadow-md text-center transition-all duration-200 ease-in-out
                    hover:shadow-lg hover:scale-[1.02] hover:bg-gray-800 group">
            <h3 class="text-lg font-medium text-gray-500 transition-colors group-hover:text-white">Total Pemesanan</h3>
            <p class="mt-2 text-4xl font-bold text-teal-500">{{ $totalPemesanan ?? 2 }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md text-center transition-all duration-200 ease-in-out
                    hover:shadow-lg hover:scale-[1.02] hover:bg-gray-800 group">
            <h3 class="text-lg font-medium text-gray-500 transition-colors group-hover:text-white">Tamu Saat Ini</h3>
            <p class="mt-2 text-4xl font-bold text-teal-500">{{ $tamuSaatIni ?? 2 }}</p>
        </div>
    </div>

    <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold text-gray-800">
                Tamu yang Sedang Menginap
            </h3>

            <a href="{{ route('pengelolaan', ['username' => $username]) }}"
            class="text-sm font-medium text-teal-500 hover:text-teal-700 transition-colors duration-150">
                Kelola Tamu
            </a>
        </div>
        <div class="divide-y divide-gray-200">

            @forelse ($daftarTamu as $tamu)
                <div class="py-4 flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="shrink-0 w-10 h-10 rounded-full bg-teal-100 text-teal-600 flex items-center justify-center font-semibold">

                            {{ strtoupper(substr($tamu['nama'], 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">{{ $tamu['nama'] }}</p>
                            <p class="text-sm text-gray-500">
                                Check-in: {{ $tamu['check_in'] }}
                            </p>
                        </div>
                    </div>
                    <div class="text-right">
                         <p class="text-sm font-medium text-gray-700">Kamar {{ $tamu['no_kamar'] }}</p>
                        <p class="text-sm font-medium text-gray-700">Tipe Kamar {{ $tamu['tipe_kamar'] }}</p>
                    </div>
                </div>
            @empty
                <div class="py-4 text-center">
                    <p class="text-sm text-gray-500">Tidak ada tamu yang sedang menginap saat ini.</p>
                </div>
            @endforelse

        </div>
    </div>
@endsection
