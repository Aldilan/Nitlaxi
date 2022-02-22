<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;

class LoginController extends Controller
{
    public function index() {
        $rooms = Room::all();
        return view('loginPages/login',compact('rooms'));
    }

    public function login(Request $request) {
        $login = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]); 

        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            if (Auth()->user()->role == 'customer') {
                return redirect()->intended('/');   
            }else if (Auth()->user()->role == 'admin') {
                return redirect()->intended('/admin');
            }else {
                return redirect()->intended('resepsionis');
            }
        }

        return back()->with('failNotif','Gagal masuk, silakan masukkan data dengan benar!');
    }

    public function logout(Request $request) {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
