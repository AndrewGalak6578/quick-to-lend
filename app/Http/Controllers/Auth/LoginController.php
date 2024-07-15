<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('login', 'password');

        if (Auth::attempt(['login' => $credentials['login'], 'password' => $credentials['password']])) {
            return redirect()->route('admin.dashboard.index');
        }
        else {
            return redirect()->route('/');
        }

        return back()->withErrors([
            'login' => 'Invalid login or password.',
        ]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('login', 'password');

        if (Auth::attempt(['login' => $credentials['login'], 'password' => $credentials['password']])) {
            return redirect()->route('guest.index');
        }
        $user = User::firstOrCreate(['login' => $credentials['login']], $credentials);

        return $user;
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
