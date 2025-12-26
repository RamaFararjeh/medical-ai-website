<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diagnosis;
use App\Models\DiagnosisSymptom;
use Illuminate\Support\Facades\DB;

class DiagnosisReportController extends Controller
{
    //
    public function index()
    {
        // إجمالي عدد التحاليل
        $total = Diagnosis::count();

        // أكثر الأمراض ظهوراً (top_disease)
        $topDiseases = Diagnosis::select('top_disease', DB::raw('COUNT(*) as total'))
            ->whereNotNull('top_disease')
            ->groupBy('top_disease')
            ->orderByDesc('total')
            ->take(10)
            ->get();

        // أكثر الأعراض تكراراً
        $topSymptoms = DiagnosisSymptom::select('symptom', DB::raw('COUNT(*) as total'))
            ->groupBy('symptom')
            ->orderByDesc('total')
            ->take(10)
            ->get();

        // توزيع Level of risk
        $riskCounts = Diagnosis::select('risk', DB::raw('COUNT(*) as total'))
            ->groupBy('risk')
            ->get();

        return view('admin-panel.reports.diagnosis_reports', [
            'total'       => $total,
            'topDiseases' => $topDiseases,
            'topSymptoms' => $topSymptoms,
            'riskCounts'  => $riskCounts,
        ]);
    }
}
