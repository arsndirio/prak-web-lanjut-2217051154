@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <!-- Ganti form action agar mengarah ke route user.update -->
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Tambahkan method PUT untuk update -->
                @method('PUT')

                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-bold mb-2">Nama:</label>
                    <!-- Tambahkan value agar form menampilkan data user yang sudah ada -->
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}" class="border border-gray-300 rounded-lg w-full py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('nama')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="npm" class="block text-gray-700 font-bold mb-2">NPM:</label>
                    <!-- Tambahkan value agar form menampilkan data NPM yang sudah ada -->
                    <input type="text" id="npm" name="npm" value="{{ old('npm', $user->npm) }}" class="border border-gray-300 rounded-lg w-full py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('npm')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="kelas_id" class="block text-gray-700 font-bold mb-2">Kelas:</label>
                    <!-- Tambahkan ternary operator agar kelas yang sudah dipilih sebelumnya tetap terpilih -->
                    <select name="kelas_id" id="kelas_id" class="border border-gray-300 rounded-lg w-full py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        @foreach ($kelas as $kelasItem)
                            <option value="{{ $kelasItem->id }}" {{ old('kelas_id', $user->kelas_id) == $kelasItem->id ? 'selected' : '' }}>{{ $kelasItem->nama_kelas }}</option>
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

                <!-- Tambahkan preview foto jika sudah ada -->
                <div class="mb-4">
                    @if ($user->foto)
                        <img src="{{ asset($user->foto) }}" alt="User Photo" width="100" class="mt-2">
                    @endif
                </div>

                <div>
                    <!-- Ganti tombol submit menjadi "Update" -->
                    <input type="submit" value="Update" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 cursor-pointer">
                </div>
            </form>
        </div>
    </div>
@endsection
