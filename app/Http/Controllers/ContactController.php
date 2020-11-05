<?php

namespace App\Http\Controllers;

use App\Mail\MailToAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Mail::to('admin@mail.com')->send(new MailToAdmin($request));

        return redirect()->back()->with('success', 'Your Mail has been send succeffully');
    }
}
