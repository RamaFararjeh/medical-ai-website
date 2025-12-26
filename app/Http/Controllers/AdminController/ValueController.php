<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ValueController extends Controller
{
    //
    public function index()
    {
        $items = Value::latest('id')->paginate(10);
        return view('admin-panel.value.list', compact('items'));
    }

    public function create()
    {
        // one default row
        $defaultItems = [
            ['point' => '', 'description' => '']
        ];
        return view('admin-panel.value.add', compact('defaultItems'));
    }

    public function store(Request $request)
    {
        // We receive parallel arrays: points[], descriptions[]
        $data = $request->validate([
            'points'        => ['required','array','min:1'],
            'points.*'      => ['nullable','string'],
            'descriptions'  => ['required','array','min:1'],
            'descriptions.*'=> ['nullable','string'],
        ]);

        $items = $this->zipAndClean($data['points'], $data['descriptions']);

        if (empty($items)) {
            return back()->withInput()->withErrors([
                'points' => 'Please add at least one point with a description.'
            ]);
        }

        Value::create([
            'items' => $items
        ]);

        return redirect()->route('admin.value.index')->with('ok', 'Created successfully.');
    }

    public function edit(Value $value)
    {
        $defaultItems = $value->items ?: [['point'=>'','description'=>'']];
        return view('admin-panel.value.edit', compact('value','defaultItems'));
    }

    public function update(Request $request, Value $value)
    {
        $data = $request->validate([
            'points'        => ['required','array','min:1'],
            'points.*'      => ['nullable','string'],
            'descriptions'  => ['required','array','min:1'],
            'descriptions.*'=> ['nullable','string'],
        ]);

        $items = $this->zipAndClean($data['points'], $data['descriptions']);

        if (empty($items)) {
            return back()->withInput()->withErrors([
                'points' => 'Please add at least one point with a description.'
            ]);
        }

        $value->update([
            'items' => $items
        ]);

        return redirect()->route('admin.value.index')->with('ok', 'Updated successfully.');
    }

    public function destroy(Value $value)
    {
        $value->delete();
        return redirect()->route('admin.value.index')->with('ok', 'Deleted.');
    }

    private function zipAndClean(array $points, array $descriptions): array
    {
        $items = [];
        $max = max(count($points), count($descriptions));

        for ($i=0; $i<$max; $i++) {
            $p = isset($points[$i]) ? Str::of($points[$i])->trim()->toString() : '';
            $d = isset($descriptions[$i]) ? Str::of($descriptions[$i])->trim()->toString() : '';

            // require at least point or description (but we want both ideally)
            if ($p !== '' || $d !== '') {
                $items[] = [
                    'point' => $p,
                    'description' => $d,
                ];
            }
        }
        // filter strong: keep only rows where point != '' (يمكن تغيّر حسب رغبتك)
        $items = array_values(array_filter($items, fn($row) => $row['point'] !== ''));

        return $items;
    }
}
