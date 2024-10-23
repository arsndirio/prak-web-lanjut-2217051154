@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-6xl px-4">
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
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-2 px-4 text-center">{{ $user->id }}</td>
                        <td class="py-2 px-4">{{ $user->nama }}</td>
                        <td class="py-2 px-4">{{ $user->npm }}</td>
                        <td class="py-2 px-4">{{ $user->kelas->nama_kelas }}</td>
                        <td class="py-2 px-4 text-center">
                            <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                                Edit
                            </button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
