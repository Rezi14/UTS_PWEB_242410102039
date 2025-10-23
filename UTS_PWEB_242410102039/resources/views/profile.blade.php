@extends('layouts.app')
@section('title', 'Profile Pengguna')
@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-4 text-gray-800">Profile Pengguna</h1>
        <hr class="mb-6">

        <div class="flex items-center space-x-6">
            <div class="w-24 h-24 rounded-full overflow-hidden">
                <img src="https://i.pinimg.com/1200x/b1/6a/0f/b16a0f9e4d6f54edadd63f512f6d61a8.jpg"
                    alt="Foto Profil"
                    class="w-full h-full object-cover">
            </div>

            <div>
                @if(isset($username) && !empty($username))
                    <h2 class="text-2xl font-semibold text-gray-900">{{ ucfirst($username) }}</h2>
                    <p class="text-gray-500">{{ $username }}@hihihi.com</p>
                @else
                    <h2 class="text-2xl font-semibold text-red-500">User tidak valid</h2>
                @endif
            </div>
        </div>

        <div class="mt-8 border-t border-gray-200 pt-6">
            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-8">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Jabatan</dt>
                    <dd class="mt-1 text-sm text-gray-900">Pengangguran</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Departemen</dt>
                    <dd class="mt-1 text-sm text-gray-900">PT Pencari Cinta Sejati</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Tanggal Bergabung</dt>
                    <dd class="mt-1 text-sm text-gray-900">18 Oktober 2023</dd>
                </div>
                 <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="mt-1 text-sm text-gray-900">Mahasiswa Biasa</dd>
                </div>
            </dl>
        </div>
    </div>
@endsection
