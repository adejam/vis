<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Sichikawa\LaravelSendgridDriver\SendGrid;

class ContactController extends Controller
{
    use SendGrid;
    public function sendmail(Request $request)
    {
        Mail::to('oluwaloseyifunmiadeleye@gmaik.com')->send(new ContactMail);
        dd('mail sent');
    }
}
