@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-6xl px-4">
        <div class="mb-4">
            <!--Tambah Pengguna Baru -->
            <a href="{{ route('user.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out transform hover:scale-105">
                Tambah Pengguna Baru
            </a>
        </div>
        <div class="bg-white shadow-md rounded-lg overflow-x-auto overflow-y-auto max-h-96">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="py-2 px-4">ID</th>
                        <th class="py-2 px-4">Nama</th>
                        <th class="py-2 px-4">NPM</th>
                        <th class="py-2 px-4">Kelas</th>
                        <th class="py-2 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="border-b hover:bg-gray-100 transition duration-300 ease-in-out transform hover:scale-105 active:bg-gray-200">
                        <td class="py-2 px-4 text-center">{{ $user->id }}</td>
                        <td class="py-2 px-4">{{ $user->nama }}</td>
                        <td class="py-2 px-4">{{ $user->npm }}</td>
                        <td class="py-2 px-4">{{ $user->kelas->nama_kelas }}</td>
                        <td class="py-2 px-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('user.edit', $user['id']) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-300 ease-in-out transform hover:scale-105">
                                    Edit
                                </a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 ease-in-out transform hover:scale-105"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                        Hapus
                                    </button>
                                </form>

                                <!-- Tombol Detail -->
                                <a href="{{ route('users.show', $user['id']) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300 ease-in-out transform hover:scale-105">
                                    View
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
