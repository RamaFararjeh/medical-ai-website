<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkController extends Controller
{
    //
    public function index()
    {
        $items = Work::latest('id')->paginate(10);
        return view('admin-panel.work.list', compact('items'));
    }

    public function create()
    {
        // one default item
        $defaultItems = [['point' => '', 'description' => '']];
        return view('admin-panel.work.add', compact('defaultItems'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'points'         => ['required','array','min:1'],
            'points.*'       => ['nullable','string'],
            'descriptions'   => ['required','array','min:1'],
            'descriptions.*' => ['nullable','string'],
        ]);

        $items = $this->zipAndClean($data['points'], $data['descriptions']);
        if (empty($items)) {
            return back()->withInput()->withErrors([
                'points' => 'Please add at least one point with a description.'
            ]);
        }

        Work::create(['items' => $items]);

        return redirect()->route('admin.work.index')->with('ok', 'Created successfully.');
    }

    public function edit(Work $work)
    {
        $defaultItems = $work->items ?: [['point'=>'','description'=>'']];
        return view('admin-panel.work.edit', compact('work','defaultItems'));
    }

    public function update(Request $request, Work $work)
    {
        $data = $request->validate([
            'points'         => ['required','array','min:1'],
            'points.*'       => ['nullable','string'],
            'descriptions'   => ['required','array','min:1'],
            'descriptions.*' => ['nullable','string'],
        ]);

        $items = $this->zipAndClean($data['points'], $data['descriptions']);
        if (empty($items)) {
            return back()->withInput()->withErrors([
                'points' => 'Please add at least one point with a description.'
            ]);
        }

        $work->update(['items' => $items]);

        return redirect()->route('admin.work.index')->with('ok', 'Updated successfully.');
    }

    public function destroy(Work $work)
    {
        $work->delete();
        return redirect()->route('admin.work.index')->with('ok', 'Deleted.');
    }

    private function zipAndClean(array $points, array $descriptions): array
    {
        $items = [];
        $max = max(count($points), count($descriptions));
        for ($i=0; $i<$max; $i++) {
            $p = isset($points[$i]) ? Str::of($points[$i])->trim()->toString() : '';
            $d = isset($descriptions[$i]) ? Str::of($descriptions[$i])->trim()->toString() : '';
            if ($p !== '' || $d !== '') {
                $items[] = ['point' => $p, 'description' => $d];
            }
        }
        // keep rows where point is not empty
        return array_values(array_filter($items, fn($row) => $row['point'] !== ''));
    }
}
