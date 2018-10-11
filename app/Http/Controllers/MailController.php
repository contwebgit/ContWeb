<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class MailController
{

    public function emailConfirmacao(Request $request)
    {
        Mail::to($request->post($request->input('mail')))->send(new SendMailable());

        return view('agradecimentos');
    }
}