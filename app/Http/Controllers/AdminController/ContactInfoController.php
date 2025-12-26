<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    //
    public function index()
    {
        $items = ContactInfo::latest('id')->paginate(10);
        return view('admin-panel.contact_info.list', compact('items'));
    }

    public function create()
    {
        return view('admin-panel.contact_info.add');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'address' => ['required','string','max:255'],
            'email'   => ['required','email','max:190'],
            'phone'   => ['required','string','max:50'],
        ]);

        ContactInfo::create($data);
        return redirect()->route('admin.contact.index')->with('ok','Created successfully.');
    }

    public function edit(ContactInfo $contact)
    {
        return view('admin-panel.contact_info.edit', compact('contact'));
    }

    public function update(Request $request, ContactInfo $contact)
    {
        $data = $request->validate([
            'address' => ['required','string','max:255'],
            'email'   => ['required','email','max:190'],
            'phone'   => ['required','string','max:50'],
        ]);

        $contact->update($data);
        return redirect()->route('admin.contact.index')->with('ok','Updated successfully.');
    }

    public function destroy(ContactInfo $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contact.index')->with('ok','Deleted.');
    }
}
