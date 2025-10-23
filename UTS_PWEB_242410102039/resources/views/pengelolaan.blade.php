@extends('layouts.app')
@section('title', 'Pengelolaan Kamar Hotel')
@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Pengelolaan Kamar Hotel</h1>
            <button class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600">
                + Tambah Kamar
            </button>
        </div>
        <hr class="mb-6">

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Kamar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe Kamar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga (per Malam)</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($data as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item['id'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item['tipe_kamar'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($item['status'] == 'Tersedia')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Tersedia
                                    </span>
                                @elseif($item['status'] == 'Terisi')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Terisi
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        {{ $item['status'] }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900 ml-4">Hapus</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                Tidak ada data kamar untuk ditampilkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white p-8 rounded-lg shadow-md mt-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Pengelolaan Tamu Menginap</h1>
        </div>
        <hr class="mb-6">

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Tamu</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Kamar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe Kamar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tgl. Check-in</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($daftartamu as $tamu)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $tamu['nama'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tamu['no_kamar'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tamu['tipe_kamar'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tamu['check_in'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <form action="{{ route('login.submit') }}" method="POST" onsubmit="return confirm('Anda yakin ingin check-out tamu ini?');">
                                    @csrf
                                    <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-white px-3 py-1 rounded-md text-sm font-medium transition-colors duration-150">
                                        Proses Check-out
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                Tidak ada tamu yang sedang menginap untuk di-checkout.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
