<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //
    public function index()
    {
        return view('admin-panel.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // تسجيل الدخول ناجح
            return redirect()->route('dashboard');
        }

        // إذا فشل تسجيل الدخول
        return back()->withErrors(['email' => 'These credentials do not match our records.'])->withInput();
    }
}
