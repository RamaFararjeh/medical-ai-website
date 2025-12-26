<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Process;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProcessController extends Controller
{
    //
    public function index()
    {
        $items = Process::latest('id')->paginate(10);
        return view('admin-panel.process.list', compact('items'));
    }

    public function create()
    {
        // one default row
        $defaultItems = [
            ['title' => '', 'description' => '']
        ];
        return view('admin-panel.process.add', compact('defaultItems'));
    }

    public function store(Request $request)
    {
        // we receive parallel arrays: titles[], descriptions[]
        $data = $request->validate([
            'titles'        => ['required','array','min:1'],
            'titles.*'      => ['nullable','string'],
            'descriptions'  => ['required','array','min:1'],
            'descriptions.*'=> ['nullable','string'],
        ]);

        $items = $this->zipAndClean($data['titles'], $data['descriptions']);

        if (empty($items)) {
            return back()->withInput()->withErrors([
                'titles' => 'Please add at least one item with a title and description.'
            ]);
        }

        Process::create(['items' => $items]);

        return redirect()->route('admin.process.index')->with('ok', 'Created successfully.');
    }

    public function edit(Process $process)
    {
        $defaultItems = $process->items ?: [['title'=>'','description'=>'']];
        return view('admin-panel.process.edit', compact('process','defaultItems'));
    }

    public function update(Request $request, Process $process)
    {
        $data = $request->validate([
            'titles'        => ['required','array','min:1'],
            'titles.*'      => ['nullable','string'],
            'descriptions'  => ['required','array','min:1'],
            'descriptions.*'=> ['nullable','string'],
        ]);

        $items = $this->zipAndClean($data['titles'], $data['descriptions']);

        if (empty($items)) {
            return back()->withInput()->withErrors([
                'titles' => 'Please add at least one item with a title and description.'
            ]);
        }

        $process->update(['items' => $items]);

        return redirect()->route('admin.process.index')->with('ok', 'Updated successfully.');
    }

    public function destroy(Process $process)
    {
        $process->delete();
        return redirect()->route('admin.process.index')->with('ok', 'Deleted.');
    }

    private function zipAndClean(array $titles, array $descriptions): array
    {
        $items = [];
        $max = max(count($titles), count($descriptions));

        for ($i=0; $i<$max; $i++) {
            $t = isset($titles[$i]) ? Str::of($titles[$i])->trim()->toString() : '';
            $d = isset($descriptions[$i]) ? Str::of($descriptions[$i])->trim()->toString() : '';
            if ($t !== '' || $d !== '') {
                $items[] = ['title' => $t, 'description' => $d];
            }
        }

        // keep rows where title is not empty (تقدر تغيّر حسب رغبتك)
        return array_values(array_filter($items, fn($row) => $row['title'] !== ''));
    }
}
