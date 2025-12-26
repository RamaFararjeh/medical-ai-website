<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientAuthController extends Controller
{
    public function showRegister()
    {
        return view('pages.register_patient');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:190'],
            'email' => ['required','email','max:190','unique:patients,email'],
            'phone' => ['nullable','string','max:50'],
            'password' => ['required','min:6','confirmed'],
        ]);

        $patient = Patient::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'password' => Hash::make($data['password']),
        ]);

        Auth::guard('patient')->login($patient);

        return redirect()->route('home')->with('ok', 'Account created successfully.');
    }

    public function showLogin()
    {
        return view('pages.login_patient');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
    
        if (Auth::guard('patient')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
    
            $patient = Auth::guard('patient')->user();
            $patient->update([
                'last_login_at' => now(),
                'is_active'     => 1,
            ]);
    
            return redirect()->route('home');
        }
    
        return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
    }
    

    public function logout(Request $request)
    {
        // 1) جيب المريض قبل ما تعمل logout
        $patient = Auth::guard('patient')->user();
    
        // 2) حدّث is_active = 0
        if ($patient) {
            $patient->update(['is_active' => 0]);
        }
    
        // 3) logout للـ patient guard فقط
        Auth::guard('patient')->logout();
    
        // 4) لا تعمل invalidate للجلسة كلها (عشان ما تطلع admin)
        $request->session()->regenerateToken();
    
        return redirect()->route('patient.login');
    }
    
    
}
