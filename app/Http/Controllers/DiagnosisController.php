<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;
use App\Models\Diagnosis;
use App\Models\DiagnosisSymptom;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class DiagnosisController extends Controller
{
    //
    /**
     * GET /diagnosis/new
     */
    public function index()
    {
        // استدعاء API الأعراض من FastAPI
        $response = Http::timeout(10)->get('http://127.0.0.1:8000/symptoms');

        // لو حدث خطأ بالـ API
        if ($response->failed()) {
            $symptoms = [];
        } else {
            $symptoms = $response->json();  // يرجّع array جاهزة
        }

        return view('pages.diagnosis', compact('symptoms'));
    }


    /**
     * POST /diagnosis/analyze
     * يستقبل: age, gender, symptoms[], duration, severity, notes
     * يرجع JSON نتيجة أولية (Mock) + مكان استدعاء المودل الحقيقي.
     */
    public function analyze(Request $request)
    {
        $data = $request->validate([
            'age'        => ['required','integer','min:0','max:120'],
            'gender'     => ['required', Rule::in(['male','female','other'])],
            'symptoms'   => ['required','array','min:1'],
            'symptoms.*' => ['string','max:100'],
            'duration'   => ['nullable','integer','min:0','max:365'],
            'severity'   => ['nullable','integer','min:1','max:10'],
            'notes'      => ['nullable','string','max:2000'],
        ]);
    
        $features = [
            'age'       => $data['age'],
            'gender'    => $data['gender'],
            'duration'  => (int) ($data['duration'] ?? 0),
            'severity'  => (int) ($data['severity'] ?? 5),
            'symptoms'  => array_values(array_unique($data['symptoms'])),
            'notes'     => Str::limit($data['notes'] ?? '', 500),
        ];
    
        $age              = $features['age'];
        $gender           = $features['gender'];
        $selectedSymptoms = $features['symptoms'];
    
        // 1) Call FastAPI
        try {
            $apiResponse = Http::timeout(15)
                ->acceptJson()
                ->post('http://127.0.0.1:8000/predict', [
                    'symptoms' => $selectedSymptoms,
                ]);
        } catch (\Throwable $e) {
            return back()
                ->withErrors(['api' => 'AI service is not available at the moment. Please try again later.'])
                ->withInput();
        }
    
        if ($apiResponse->failed()) {
            return back()
                ->withErrors(['api' => 'AI service returned an error. Please try again later.'])
                ->withInput();
        }
    
        $json = $apiResponse->json();
        $predictions = $json['predictions'] ?? [];
    
        // 2) Risk + top disease
        $topProb    = $predictions[0]['probability'] ?? 0;
        $topDisease = $predictions[0]['disease'] ?? null;
    
        $risk = ($topProb >= 0.7) ? 'high' : (($topProb >= 0.4) ? 'moderate' : 'low');
    
        $advice = match ($risk) {
            'high'     => 'High risk. Seek medical attention promptly, especially if symptoms worsen.',
            'moderate' => 'Moderate risk. Rest, hydrate, and monitor symptoms. Consider consulting a doctor.',
            default    => 'Low risk. Home care is likely sufficient. If symptoms persist, see a physician.',
        };
    
        // 3) Save to DB
        $diagnosis = Diagnosis::create([
            'user_id'         => Auth::id(),
            'age'             => $age,
            'gender'          => $gender,
            'duration'        => $features['duration'],
            'severity'        => $features['severity'],
            'risk'            => $risk,
            'top_disease'     => $topDisease,
            'top_probability' => $topProb,
            'predictions'     => $predictions,
            'notes'           => $features['notes'],
        ]);
    
        foreach ($selectedSymptoms as $sym) {
            DiagnosisSymptom::create([
                'diagnosis_id' => $diagnosis->id,
                'symptom'      => $sym,
            ]);
        }
    
        // 4) Suggested specialty + doctor
        $suggestedSpecialty = null;
        $suggestedDoctor    = null;
    
        if (!empty($topDisease)) {
            $diseaseKey = strtolower(trim($topDisease));
    
            $map = config('ai_specialties.disease_to_specialty', []);
            $lowerMap = [];
            foreach ($map as $k => $v) {
                $lowerMap[strtolower(trim($k))] = $v;
            }
    
            $suggestedSpecialty = $lowerMap[$diseaseKey] ?? null;
    
            if ($suggestedSpecialty) {
                $specKey = strtolower(trim($suggestedSpecialty));
    
                $suggestedDoctor = Doctor::query()
                    ->where('is_active', 1)
                    ->whereRaw('LOWER(TRIM(specialty)) = ?', [$specKey])
                    ->inRandomOrder()
                    ->first();
            }
        }
    
        // 5) Suggested medicines (from config, no DB)
        $suggestedMedicines = [];
    
        if (!empty($topDisease)) {
            $diseaseKey = strtolower(trim($topDisease));
    
            $medMap = config('ai_medicines.disease_to_medicines', []);
            $lowerMedMap = [];
            foreach ($medMap as $k => $v) {
                $lowerMedMap[strtolower(trim($k))] = $v;
            }
    
            $suggestedMedicines = $lowerMedMap[$diseaseKey] ?? [];
        }
        // dd(config('ai_medicines'));

        // dd($topDisease, $suggestedMedicines, config('ai_medicines.disease_to_medicines'));

        // 6) Return view
        return view('pages.diagnosis_result', [
            'predictions'        => $predictions,
            'age'                => $age,
            'gender'             => $gender,
            'selectedSymptoms'   => $selectedSymptoms,
            'risk'               => $risk,
            'advice'             => $advice,
            'suggestedSpecialty' => $suggestedSpecialty,
            'suggestedDoctor'    => $suggestedDoctor,
            'suggestedMedicines' => $suggestedMedicines,
        ]);
    }
    
    
    
}
