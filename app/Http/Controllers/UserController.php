<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            'email' => 'email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        if($validator->fails()) {
            return redirect('register')->withInput()->withErrors($validator->fails());
        }

        $request['level'] = 'user';
        $request['password'] = bcrypt($request->password);

        User::create($request->all());

        return redirect()->route('login');
    }

    public function change_password() {
        return view('auth.changePassword');
    }

    public function proses_change_password(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        $old_password = Hash::check($request->old_password, Auth::user()->password);

        if($old_password) {
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            return redirect()->back()->with('message', 'Password Berhasil Diubah');
        }

        return redirect()->back()->with('error', 'Gagal Ganti Password');
    }

    public function logout(Request $request) {
        $request->session()->flush();

        Auth::logout();
        return redirect('login');
    }
}
