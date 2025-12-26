<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    //
    public function index()
    {
        $items = Mission::latest('id')->paginate(10);
        return view('admin-panel.mission.list', compact('items'));
    }

    public function create()
    {
        return view('admin-panel.mission.add');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'paragraph' => ['required','string'],
        ]);

        Mission::create($data);

        return redirect()->route('admin.mission.index')->with('ok', 'Created successfully.');
    }

    public function edit(Mission $mission)
    {
        return view('admin-panel.mission.edit', compact('mission'));
    }

    public function update(Request $request, Mission $mission)
    {
        $data = $request->validate([
            'paragraph' => ['required','string'],
        ]);

        $mission->update($data);

        return redirect()->route('admin.mission.index')->with('ok', 'Updated successfully.');
    }

    public function destroy(Mission $mission)
    {
        $mission->delete();
        return redirect()->route('admin.mission.index')->with('ok', 'Deleted.');
    }
}
