<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\OrderCreatedEmail;
use Auth;

class SendEmailController extends Controller
{
    //
    public function index()
    {
        return view('emails.send_email');
    }

    public static function sendOrderWasCreated($id)
    {
        $user_id = Auth::id();
        $customer = DB::table('users')->where('id', $user_id)->select('email')->get();

        $data = array(
            'name' => 'Tikken',
            'id' => $id
        );

        Mail::to('tikken23@gmail.com')->send(new OrderCreatedEmail($data));
    }
    public function send(Request $request)
    {
        $customer = $request->customer;

        $data = array(
            'name' => $request->name,
            'message' => $request->message
        );

        Mail::to($customer)->send(new SendMail($data));

        return back()->with('success', 'Thanks for contacting us');
    }

    public function testEmailTemplate()
    {
        return view('emails.order_created');
    }
}
