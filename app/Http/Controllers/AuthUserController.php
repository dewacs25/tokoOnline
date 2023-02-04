<?php

namespace App\Http\Controllers;

use App\Mail\KirimVerifikasiEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthUserController extends Controller
{

    public function register()
    {
        $data['title'] = 'Register';
        return view('frontend/auth/register');
    }

    public function register_action(Request $req)
    {

        $req->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ]);

        $username = substr($req->nama_lengkap, 0, 10) . '-' . substr(uniqid(), 0, 5);
        $token = md5($req->email) . '-' . uniqid();
        $kode = rand(100000, 999999);
        $user = new User([
            'email' => $req->email,
            'nama_lengkap' => $req->nama_lengkap,
            'username' => $username,
            'password' => Hash::make($req->password),
            'token' => $token,
            'kode_verifikasi' => $kode,
        ]);
        $user->save();

        $data = [
            'kode' => $kode,
            'name' => $req->nama_lengkap,
        ];

        Mail::to($req->email)->send(new KirimVerifikasiEmail($data));

        return redirect('/confirm/' . $token);
    }

    public function login()
    {
        $data['title'] = 'Login';
        return view('auth/login', $data);
    }

    public function login_action(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('users')->attempt(['email' => $req->email, 'password' => $req->password])) {
            $req->session()->regenerate();
            return redirect()->intended('/');
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
        $user = User::find(Auth::id());
        $user->password = Hash::make($req->new_password);
        $user->save();
        $req->session()->regenerate();
        return back()->with('succes', 'Password Berhasil Dirubah');
    }

    public function logout(Request $request)

    {
        Auth::guard('users')->logout();
        return redirect('/');
    }

    public function confirmEmail($token)
    {
        return view('frontend/auth/confirmEmail', ['token' => $token]);
    }

    public function confirmEmailAction(Request $req, $token)
    {
        $req->validate([
            'kode' => 'required|min:6'
        ]);

        $cekToken = User::where('token', $token)->get()->first();

        if ($cekToken) {
            if ($token == $cekToken->token && $req->kode == $cekToken->kode_verifikasi) {
                User::where('id_user',$cekToken->id_user)->update([
                    'validate'=>'verified',
                ]);
            } else {
                return redirect('/confirm/' . $token)->with(session()->flash('danger', 'Kode Salah')); 
            }
        }else{
            return redirect('/token-tidak-di-temukan'); 
        }
    }
}
