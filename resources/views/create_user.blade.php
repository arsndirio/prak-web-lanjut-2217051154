<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <form action="{{ route('user.store') }}" method="POST"> 
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 font-bold mb-2">Nama:</label>
                <input type="text" id="nama" name="nama" class="border border-gray-300 rounded-lg w-full py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('nama')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="npm" class="block text-gray-700 font-bold mb-2">NPM :</label>
                <input type="text" id="npm" name="npm" class="border border-gray-300 rounded-lg w-full py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('npm')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kelas_id" class="block text-gray-700 font-bold mb-2">Kelas :</label>
                <select name="kelas_id" id="kelas_id" class="border border-gray-300 rounded-lg w-full py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                    @endforeach
                </select>

                @error('kelas_id')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror

            </div>

            <div>
                <input type="submit" value="Submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 cursor-pointer">
            </div>
        </form>
    </div>
</body>
</html>
