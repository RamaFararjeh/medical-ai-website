<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Diagnosis;
use App\Models\Doctor;
use App\Models\Process;

class HomeController extends Controller
{
    //
    public function index()
    {
        $doctorCount     = Doctor::count();          // عدد الدكاترة
        $diagnosisCount  = Diagnosis::count();    // عدد حالات التشخيص
        $modelAccuracy   = 83; 
        $about = About::orderByDesc('updated_at')->first();

        // نص بديل إذا ما في بيانات
        $fallback = [
            'paragraph' => "Welcome to Medicate — AI-assisted care. (No content added yet from admin.)",
            'points'    => [
                'Comprehensive Inpatient Services',
                'Medical & Surgical Services',
                'Outpatient Services',
            ],
        ];

        // التأكد من أن النقاط عبارة عن مصفوفة
        $items = is_array($about?->points) ? $about->points : $fallback['points'];


        //doctors 
        $doctors = Doctor::query()
        ->where('is_active', true)
        ->orderByDesc('id')
        ->get(['id','name','specialty','years_experience','photo']);

        // آخر سجل من جدول process
        $process = Process::orderByDesc('updated_at')->first();

        // مصفوفة خطوات من DB (items عبارة عن [{title,desc}, ...])
        $processItems = [];
        if ($process && is_array($process->items)) {
            foreach ($process->items as $it) {
                $processItems[] = [
                    'title' => $it['title'] ?? ($it['t'] ?? 'Step'),
                    'desc'  => $it['description'] ?? ($it['desc'] ?? ($it['d'] ?? '')),
                ];
            }
        }
        return view('pages.index', compact('about', 'items', 'fallback','doctors','processItems','doctorCount','diagnosisCount','modelAccuracy'));
    }
}
