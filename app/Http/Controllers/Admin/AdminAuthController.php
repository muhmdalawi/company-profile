<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        if (session()->has('admin_user_id')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return back()
                ->withInput($request->only('email'))
                ->with('error', 'Email atau password tidak sesuai.');
        }

        $request->session()->regenerate();
        session([
            'admin_user_id' => $user->id,
            'admin_name' => $user->name,
            'admin_email' => $user->email,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Login berhasil.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['admin_user_id', 'admin_name', 'admin_email']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logout berhasil.');
    }
}
