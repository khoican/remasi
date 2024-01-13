<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user();

        if($user) {
            if($user->level ==='admin') {
                return redirect('/admin');
            } else if ($user->level ==='user') {
                return redirect('/');
            }
        }

        return view('auth.login');
    }

    public function proses_login (Request $request) {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only('name', 'password');

        if(Auth::attempt($credential)) {
            $user = Auth::user();

            if($user->level ==='admin') {
                return redirect('/admin');
            } else if ($user->level ==='user') {
                return redirect('/');
            }

            return redirect('/');
        }

        return redirect('login')->withInput()->withErrors(['login-gagal'=>'Username atau Password salah!']);
    }

    public function register() {
        return view('auth.register');
    }

    public function proses_register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required|min:8'
        ]);

        if($validator->fails()) {
            return redirect('register')->withInput()->withErrors($validator->fails());
        }

        $request['level'] = 'user';
        $request['password'] = bcrypt($request->password);

        User::create($request->all());

        return redirect()->route('login');
    }

    public function logout(Request $request) {
        $request->session()->flush();

        Auth::logout();
        return redirect('login');
    }
}
