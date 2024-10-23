<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Profil Mahasiswa</title> 
    <script src="https://cdn.tailwindcss.com"></script> 
</head> 
<body class="bg-gradient-to-r from-blue-400 to-purple-600 flex items-center justify-center h-screen"> 
    <div class="bg-white p-10 rounded-3xl shadow-2xl text-center w-96 transform transition duration-500 hover:scale-105"> 
        <h2 class="text-2xl font-extrabold mb-6 text-gray-800">Profil Mahasiswa</h2> 

        <div class="relative inline-block mb-6"> 
            <img src="placeholder.png" id="profilePic" alt="Profile Picture" class="w-40 h-40 rounded-full border-8 border-gray-300 object-cover shadow lg"> 

            <label for="fileInput" class="absolute bottom-0 right-0 bg-blue-500 text-white p-3 rounded-full cursor-pointer transition duration-300 ease-in-out hover:bg-blue-600"> 
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> 
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89-2.63A2 2 0 0113.11 6H21a2 2 0 012 2v10a2 2 0 01-2 2H3a2 2 0 01-22V8a2 2 0 012-2z" /> 
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10a3 3 0 11-6 0 3 3 0 016 0z" /> 
                </svg> 
            </label> 
            <input type="file" id="fileInput" accept="image/*" class="hidden"> 
        </div> 

        <div class="space-y-4"> 
            <div class="bg-gray-200 py-3 px-6 rounded-lg text-lg shadow-inner">Nama: {{ $nama }}</div> 
            <div class="bg-gray-200 py-3 px-6 rounded-lg text-lg shadow-inner">Kelas: {{ $kelas }}</div> 
            <div class="bg-gray-200 py-3 px-6 rounded-lg text-lg shadow-inner">NPM: {{ $npm }}</div> 
        </div> 
    </div> 

    <script> 
        const fileInput = document.getElementById('fileInput'); 
        const profilePic = document.getElementById('profilePic'); 

        fileInput.addEventListener('change', function(e) { 
            const file = e.target.files[0]; 
            if (file) { 
                const reader = new FileReader(); 
                reader.onload = function(e) { 
                    profilePic.src = e.target.result; 
                } 
                reader.readAsDataURL(file); 
            } 
        }); 
    </script> 
</body> 
</html>
