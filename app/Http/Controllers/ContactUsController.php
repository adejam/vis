<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contact.contactForm');
    }

    public function send(Request $request)
    {
        $this->validate(
            $request,
            [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
            ]
        );
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message ];

        Mail::to('communivis@gmail.com')->send(new contactUsMail($data));

        if (Mail::failures() != 0) {
            return back()->with('success', 'Thanks for contacting us!, We will get back to you soon');
        } else {
            return back()->with('error', 'Mail not sent!');
        }
    }
}
