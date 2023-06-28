<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginpage() {
        return view('auth.login');
    }

    public function loginUser(Request $req)
    {
        $req->validate([
            'identity_number' => 'required',
            'password' => 'required',

        ]);

        $identity_number = $req->get('identity_number');
        $credentials = $req->only('identity_number', 'password');
        $user = User::where('identity_number', $identity_number)->first();
        if (auth()->guard('web')->attempt($credentials) && $user->id_role == 1) {
            session(["identity_number" => $identity_number]);
            alert()->success('Login Success');
            return redirect('/admin');
        } elseif (auth()->guard('web')->attempt($credentials) && $user->id_role == 2) {
            session(["identity_number" => $identity_number]);
            alert()->success('Login Success');
            return redirect('/dosen');
        } elseif (auth()->guard('web')->attempt($credentials) && $user->id_role == 3) {
            session(["identity_number" => $identity_number]);
            if($req->is_wali == 'on'){
                session(["is_wali" => true]);
            }
            alert()->success('Login Success');
            return redirect('/mahasiswa');
        }
        else {
            alert()->error('Email atau ' . 'Password'. ' Salah!' );
            return redirect('/login');
        }
    }

    public function registerPage() {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->child_name = $request->child_name;
        $user->child_age = $request->child_age;
        $user->email = $request->email;
        $user->role = 'User';
        $user->is_verified = 1;
        $user->password = bcrypt($request->password);
        $user->save();
        alert()->success('Akun ' . 'Berhasil'. ' Dibuat!' );
        return redirect('/login');
    }

    public function userLogout() {
        session()->flush();
        Auth::logout();
        return redirect('/login');
    }
}
