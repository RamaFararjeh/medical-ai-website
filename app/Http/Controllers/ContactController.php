<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactMessage;
use App\Models\ContactInfo;

class ContactController extends Controller
{
    //
    public function index()
    {
        $contact = ContactInfo::query()->orderBy('id','desc')->first();

        return view('pages.contact', compact('contact'));
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required','string','max:120'],
            'email'   => ['required','email','max:190'],
            'subject' => ['required','string','max:190'],
            'message' => ['required','string','min:5'],
        ]);

        ContactMessage::create($data);

        return back()->with('ok', 'Your message has been sent successfully.');
    }
}
