<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientsController extends Controller
{
    //
    public function index()
    {
        $items = Patient::orderByDesc('id')->paginate(15);
        return view('admin-panel.patients.list', compact('items'));
    }
}
