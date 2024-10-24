<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function profile() 
    { 
        return view('profile'); 
    }

    public function create(){ 

        $kelas = $this->kelasModel->getKelas(); 

        $data = [ 
                 'title' => 'Create User',
                 'kelas' => $kelas, 
                ];
        return view('create_user', [
            'kelas' => Kelas::all(),
        ]); 
        }

        
    public function store(Request $request)
        {
        // Validasi input
        $request->validate([
        'nama' => 'required|string|max:255',
        'npm' => 'required|string|max:255',
        'kelas_id' => 'required|integer',
        'foto' =>
        'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //
        //Validasi untuk foto
        ]);
        // Meng-handle upload foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName(); // Menambahkan timestamp agar unik
            $foto->move(public_path('upload/img'), $fotoName); // Memindahkan file ke public/upload/img
            $fotoPath = 'upload/img/' . $fotoName; // Menyimpan path relatif dari foto yang diupload
        } else {
            // Jika tidak ada foto yang di-upload, gunakan foto default
            $fotoPath = 'assets/img/IMG-20241004-WA0009.jpg';
        }
        
        
        // Menyimpan data ke database termasuk path foto
        $this->userModel->create([
        'nama' => $request->input('nama'),
        'npm' => $request->input('npm'),
        'kelas_id' => $request->input('kelas_id'),
        'foto' => $fotoPath, // Menyimpan path foto
        ]);
        return redirect()->to('/users')->with('success', 'User
        berhasil ditambahkan');
        }

    public function index() 
        { 
    // Mengambil semua data pengguna dari model
    $users = $this->userModel->all();

    // Mengirim data users ke view
    return view('list_user', ['users' => $users]); 
        }

    
    
    public function show ($id) {
        $user = $this->userModel->getUser($id);
        $data = [
            'title' => 'Profile',
            'user' => $user,
    ];
    
        return view('profile', $data);
    }

    public function edit($id)
{
    $user = UserModel::findOrFail($id);
    $kelasModel = new Kelas();
    $kelas = $kelasModel->getKelas();
    $title = 'Edit User';
    return view('edit_user', compact('user', 'kelas', 'title'));
}

public function update(Request $request, $id)
{
    $user = UserModel::findOrFail($id);

    $user->nama = $request->nama;
    $user->npm = $request->npm;
    $user->kelas_id = $request->kelas_id;

    if ($request->hasFile('foto')) {
        $fileName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('uploads'), $fileName);
        $user->foto = 'uploads/' . $fileName;
    }

    $user->save();

    return redirect()->route('user.list')->with('success', 'User updated successfully');
}

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->route('user.list')->with('success', 'User has been deleted successfully');
    }



}
