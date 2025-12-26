<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Mission;
use App\Models\Value;
use App\Models\Work;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index()
    {
        // الجدول عندك بسيط: id, paragraph, points, timestamps
        $items = About::query()->orderBy('id')->get(['id','paragraph','points']);

        // مجموع عدد العناصر داخل جميع القوائم (لو points = ["A","B",...])
        $totalPoints = $items->reduce(function ($carry, $row) {
            if (is_array($row->points)) {
                return $carry + count($row->points);
            }
            if (is_numeric($row->points)) {
                return $carry + (int)$row->points;
            }
            return $carry;
        }, 0);

        // Mission: آخر سطر أو أول سطر (براحتك)
        $mission = Mission::query()->orderBy('id', 'desc')->first();

        // Work: أول record يحتوي items = [{point, description, icon?}, ...]
        $workItems = optional(
            Work::query()->orderBy('id','desc')->first()
        )->items ?? [];


        $valuesItems = optional(
            Value::query()->orderBy('id','desc')->first()
        )->items ?? [];

        return view('pages.about', compact('items', 'totalPoints','mission','workItems','valuesItems'));
    }
}
