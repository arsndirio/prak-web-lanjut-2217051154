@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h2 class="text-2xl font-extrabold mb-6 text-gray-800">Profil Mahasiswa</h2>

        <!-- Menampilkan Foto (default jika tidak ada foto) -->
        <div class="relative inline-block mb-6">
            <img src="{{ $user->foto ? asset($user->foto) : asset('assets/img/IMG-20241004-WA0009.jpg') }}" alt="Foto Mahasiswa" class="w-40 h-40 rounded-full border-8 border-gray-300 object-cover shadow lg">
        </div>

        <!-- Menampilkan Nama, NPM, dan Kelas -->
        <div class="space-y-4">
            <h1 class="bg-gray-200 py-3 px-6 rounded-lg text-lg shadow-inner">Nama: {{ $user->nama }}</h1>
            <h1 class="bg-gray-200 py-3 px-6 rounded-lg text-lg shadow-inner">NPM: {{ $user->npm }}</h1>
            <h1 class="bg-gray-200 py-3 px-6 rounded-lg text-lg shadow-inner">Kelas: {{ $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan' }}</h1>
        </div>
    </div>
</div>
@endsection
