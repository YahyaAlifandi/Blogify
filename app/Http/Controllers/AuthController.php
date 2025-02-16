<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_view()
    {
        return view('auth.login');
    }
    public function registrasi_view()
    {
        return view('auth.registrasi');
    }

    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($data)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/laman-admin');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/login_gagal');
        }
    }

    public function registrasi(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
        ];

        User::create($data);
        return redirect('/login-blog');
    }

    public function logout() {
        Auth::logout();
        return redirect('/login-blog');
    }
}
