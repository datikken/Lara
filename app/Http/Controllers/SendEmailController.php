<?php

namespace App\Http\Controllers;

use App\Mail\PasswordResetEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\OrderCreatedEmail;
use Illuminate\Support\Facades\URL;

class SendEmailController extends Controller
{
    public function index()
    {
        return view('emails.send_email');
    }

    public static function sendPasswordResetEmail(Request $request)
    {
        $email = $request->email;
        $user = DB::table('users')->where('email', $email)->get();
        $changePass = new ChangePasswordController();
        $tokenReq = $changePass->createResetToken($email);
        $link = URL::to('login') . '?token=' . $tokenReq['message'];
        $emailData = array('email' => $email, 'link' => $link);

        if($tokenReq['status'] == '200') {
            Mail::to($email)->send(new PasswordResetEmail($emailData));
        }

        return $tokenReq;
    }

    public static function sendOrderWasCreated($id)
    {
        $user_id = Auth::id();
        $customer = DB::table('users')->where('id', $user_id)->select('email')->get();

        $data = array(
            'name' => 'Tikken',
            'id' => $id
        );

        Mail::to($customer)->send(new OrderCreatedEmail($data));
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
        return view('emails.password_reset');
    }
}
