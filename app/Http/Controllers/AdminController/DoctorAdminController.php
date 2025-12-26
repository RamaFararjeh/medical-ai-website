<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DoctorAdminController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        // roles عندك: admin / Doctors
        $isDoctor = $user?->hasRole('Doctors') || $user?->hasRole('doctor');
        $isAdmin  = $user?->hasRole('admin');

        // Admin: كل الدكاترة
        if ($isAdmin) {
            $items = Doctor::orderByDesc('id')->paginate(15);
            return view('admin-panel.doctors.list', compact('items','isAdmin','isDoctor'));
        }

        // Doctor: بياناته فقط (حسب الايميل)
        if ($isDoctor) {
            $myDoctor = Doctor::where('email', $user->email)->first();

            // رجّع صف واحد فقط أو فاضي
            $items = $myDoctor
                ? Doctor::whereKey($myDoctor->id)->paginate(15)
                : Doctor::whereRaw('1=0')->paginate(15);

            return view('admin-panel.doctors.list', compact('items','isAdmin','isDoctor','myDoctor'));
        }

        abort(403);
    }
    

    public function create()
    {
        return view('admin-panel.doctors.add');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'              => ['required','string','max:190'],
            'specialty'         => ['nullable','string','max:190'],
            'age'               => ['nullable','integer','min:0','max:120'],
            'gender'            => ['nullable','in:male,female,other'],
            'email'             => ['nullable','email','max:190'],
            'phone'             => ['nullable','string','max:50'],
            'years_experience'  => ['nullable','integer','min:0','max:80'],
            'bio'               => ['nullable','string'],
            'is_active'         => ['nullable','boolean'],
            'photo'             => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads/doctors','public');
        }

        $data['is_active'] = $request->boolean('is_active', true);

        Doctor::create($data);

        return redirect()->route('admin.doctors.index')->with('ok','Doctor created successfully.');
    }

    public function edit(Doctor $doctor)
    {
        return view('admin-panel.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $data = $request->validate([
            'name'              => ['required','string','max:190'],
            'specialty'         => ['nullable','string','max:190'],
            'age'               => ['nullable','integer','min:0','max:120'],
            'gender'            => ['nullable','in:male,female,other'],
            'email'             => ['nullable','email','max:190'],
            'phone'             => ['nullable','string','max:50'],
            'years_experience'  => ['nullable','integer','min:0','max:80'],
            'bio'               => ['nullable','string'],
            'is_active'         => ['nullable','boolean'],
            'photo'             => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            // delete old if exists
            if ($doctor->photo && Storage::disk('public')->exists($doctor->photo)) {
                Storage::disk('public')->delete($doctor->photo);
            }
            $data['photo'] = $request->file('photo')->store('uploads/doctors','public');
        }

        $data['is_active'] = $request->boolean('is_active', true);

        $doctor->update($data);

        return redirect()->route('admin.doctors.index')->with('ok','Doctor updated successfully.');
    }

    public function destroy(Doctor $doctor)
    {
        if ($doctor->photo && Storage::disk('public')->exists($doctor->photo)) {
            Storage::disk('public')->delete($doctor->photo);
        }
        $doctor->delete();
        return redirect()->route('admin.doctors.index')->with('ok','Doctor deleted.');
    }
}
