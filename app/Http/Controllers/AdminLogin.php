<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLogin extends Controller
{
    public function login()
    {
        $data['title'] = 'Login';
        return view('admin/auth/login', $data);
    }

    public function login_action(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password])) {
            $req->session()->regenerate();
            return redirect()->intended('/admin');
        } 

        return back()->withErrors([
            'password' => 'email atau password salah'
        ]);
    }

    public function password()
    {
        $data['title'] = 'Rubah Password';
        return view('auth/password', $data);
    }
    public function password_action(Request $req)
    {
        $req->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = Admin::find(Auth::id());
        $user->password = Hash::make($req->new_password);
        $user->save();
        $req->session()->regenerate();
        return back()->with('succes', 'Password Berhasil Dirubah');
    }

    public function logoutAdmin()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/auth/login');
    }
}
