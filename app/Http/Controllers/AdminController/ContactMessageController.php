<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    //
    public function index(Request $request)
    {
        $q   = trim($request->get('q', ''));
        $col = in_array($request->get('sort'), ['created_at','name','email','subject']) ? $request->get('sort') : 'created_at';
        $dir = $request->get('dir') === 'asc' ? 'asc' : 'desc';

        $messages = ContactMessage::query()
            ->when($q, function($query) use ($q) {
                $query->where(function($qq) use ($q){
                    $qq->where('name','like',"%$q%")
                       ->orWhere('email','like',"%$q%")
                       ->orWhere('subject','like',"%$q%")
                       ->orWhere('message','like',"%$q%");
                });
            })
            ->orderBy($col, $dir)
            ->paginate(15)
            ->withQueryString();

        return view('admin-panel.contact_message.list', compact('messages', 'q', 'col', 'dir'));
    }

    // GET /admin/messages/{id}
    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('admin-panel.contact_message.show', compact('message'));
    }

    // DELETE /admin/messages/{id}
    public function destroy($id)
    {
        ContactMessage::findOrFail($id)->delete();
        return back()->with('ok', 'Message deleted.');
    }
}
