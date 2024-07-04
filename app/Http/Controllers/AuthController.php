<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {

                return redirect()->intended('tamu')->with('message', 'Berhasil Login');

        } else {
            return redirect()->back()->withErrors([
                'email' => 'Username atau password salah.',
            ]);
        }

    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
