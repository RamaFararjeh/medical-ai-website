<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class DoctorController extends Controller
{
    //
    public function index()
    {
        $doctors = Doctor::orderBy('name')->get();
        return view('pages.doctors', compact('doctors'));
    }

    public function show(Doctor $doctor)   // يربط تلقائياً عبر slug
    {
        return view('pages.show-doctor', compact('doctor'));
    }

}
