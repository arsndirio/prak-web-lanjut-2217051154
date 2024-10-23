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
            $this->userModel->create([ 
                'nama' => $request->input('nama'), 
                'npm' => $request->input('npm'), 
                'kelas_id' => $request->input('kelas_id'), 
                ]); 

                return redirect()->to('/user'); 
        }

    public function index() 
        { 
    // Mengambil semua data pengguna dari model
    $users = $this->userModel->all();

    // Mengirim data users ke view
    return view('list_user', ['users' => $users]); 
        }
}
