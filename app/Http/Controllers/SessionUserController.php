<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class SessionUserController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('tampilanuser.login.login');
    }

    // Menampilkan form signup
    public function showSignupForm()
    {
        return view('tampilanuser.login.signup');
    }

    // Proses autentikasi user
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('index-user');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    // Proses registrasi user
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|digits_between:10,15',
            'location' => 'nullable|string|max:255',
            'about_me' => 'nullable|string|max:255'
        ]);

        $user = Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'location' => $request->location,
            'about_me' => $request->about_me
        ]);

        Auth::login($user);

        return redirect('index-user');
    }

    // Proses logout user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
