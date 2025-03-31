<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12'
        ]);

        $users = json_decode(file_get_contents(storage_path('users.json')), true) ?? [];

        foreach ($users as $user) {
            if ($user['email'] === $request->email && password_verify($request->password, $user['password_hashed'])) {
                Session::put('user', $user['nama']);
                return redirect()->route('barangs.index');
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah!']);
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:12|confirmed'
        ]);

        $data = json_decode(file_get_contents(storage_path('users.json')), true) ?? [];

        $data[] = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password_hashed' => password_hash($request->password, PASSWORD_DEFAULT)
        ];

        file_put_contents(storage_path('users.json'), json_encode($data, JSON_PRETTY_PRINT));

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
