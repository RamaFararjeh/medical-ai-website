<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutAdminController extends Controller
{
    //
    public function index()
    {
        $items = About::latest('id')->paginate(10);
        return view('admin-panel.about.list', compact('items'));
    }

    public function create()
    {
        // نقطة واحدة افتراضيًا في الفورم
        $defaultPoints = [""];
        return view('admin-panel.about.add', compact('defaultPoints'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'paragraph'    => ['required','string'],
            'points'       => ['required','array','min:1'],
            'points.*'     => ['nullable','string'],
        ]);

        // تنظيف النقاط الفارغة
        $points = array_values(array_filter($data['points'] ?? [], fn($p) => Str::of($p)->trim()->isNotEmpty()));

        if (empty($points)) {
            return back()->withInput()->withErrors(['points' => 'يجب إضافة نقطة واحدة على الأقل.']);
        }

        About::create([
            'paragraph' => $data['paragraph'],
            'points'    => $points,
        ]);

        return redirect()->route('admin.about.index')->with('ok', 'تمت الإضافة بنجاح.');
    }

    public function edit(About $about)
    {
        $defaultPoints = $about->points ?: [""];
        return view('admin-panel.about.edit', compact('about','defaultPoints'));
    }

    public function update(Request $request, About $about)
    {
        $data = $request->validate([
            'paragraph'    => ['required','string'],
            'points'       => ['required','array','min:1'],
            'points.*'     => ['nullable','string'],
        ]);

        $points = array_values(array_filter($data['points'] ?? [], fn($p) => Str::of($p)->trim()->isNotEmpty()));

        if (empty($points)) {
            return back()->withInput()->withErrors(['points' => 'يجب إضافة نقطة واحدة على الأقل.']);
        }

        $about->update([
            'paragraph' => $data['paragraph'],
            'points'    => $points,
        ]);

        return redirect()->route('admin.about.index')->with('ok', 'تم التعديل بنجاح.');
    }

    public function destroy(About $about)
    {
        $about->delete();
        return redirect()->route('admin.about.index')->with('ok', 'تم الحذف.');
    }
}
