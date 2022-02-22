<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;

class SignupController extends Controller
{
    public function index() {
        $rooms = Room::all();
        return view('loginPages/signup',compact('rooms'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'username' => 'required|min:2|max:20|unique:user',
            'namaDepan' => 'required|max:30',
            'namaBelakang' => 'required|max:30',
            'email' => 'required|email:dns|max:25|unique:user',
            'nomor' => 'required|min:10|max:14|unique:user',
            'password' => 'required|min:6|max:20',
            'passwordConfirm' => 'required|min:6|max:20'
        ]);
        $name = $validated['namaDepan'] .' '. $validated['namaBelakang'];

        if ($validated['password'] == $validated['passwordConfirm']) {
            $validated['password'] = bcrypt($validated['password']);

            User::create([
                'name' => $name,
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => $validated['password'],
                'nomor' => $validated['nomor'],
                'role' => 'customer',
            ]);
            return redirect('/login')->with('successNotif','Akun anda berhasil dibuat, silahkan masuk di sini!');
        }else{
            return redirect('/signup')->with('failNotif', 'Password yang anda masukkan tidak sama.');
        }
    }
}
