@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <!-- Tambahkan enctype multipart/form-data -->
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-bold mb-2">Nama:</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="border border-gray-300 rounded-lg w-full py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('nama')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="npm" class="block text-gray-700 font-bold mb-2">NPM:</label>
                    <input type="text" id="npm" name="npm" value="{{ old('npm') }}" class="border border-gray-300 rounded-lg w-full py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('npm')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="kelas_id" class="block text-gray-700 font-bold mb-2">Kelas:</label>
                    <select name="kelas_id" id="kelas_id" class="border border-gray-300 rounded-lg w-full py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        @foreach ($kelas as $kelasItem)
                            <option value="{{ $kelasItem->id }}" {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }}>{{ $kelasItem->nama_kelas }}</option>
                        @endforeach
                    </select>
                    @error('kelas_id')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tambahkan input file untuk upload foto -->
                <div class="mb-4">
                    <input type="file" id="foto" name="foto" class="border border-gray-300 rounded-lg w-full py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <label for="foto" class="block text-gray-700 font-bold mb-2">Foto:</label>
                    @error('foto')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <input type="submit" value="Submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 cursor-pointer">
                </div>
            </form>
        </div>
    </div>
@endsection
