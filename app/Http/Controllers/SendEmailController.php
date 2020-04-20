<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    //
    public function index()
    {
        return view('emails.send_email');
    }

    public function send(Request $request)
    {

//        $this->validate($request, [
//            'name' => 'required',
//            'email' => 'required|email',
//            'message' => 'required'
//        ]);
//
        $data = array(
            'name' => $request->name,
            'message' => $request->message
        );

        dump($data);

        Mail::to('tikken23@gmail.com')->send(new SendMail($data));

        return back()->with('success', 'Thanks for contacting us');
    }
}
