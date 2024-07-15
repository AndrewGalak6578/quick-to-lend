<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegisterForm() {
        return view('auth.register');
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

        return redirect()->route('admin.dashboard.index');
    }


}
