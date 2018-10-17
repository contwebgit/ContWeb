<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class MailController
{
    public function emailConfirmacao(Request $request)
    {

        $email = $request->input('email');
        Mail::to($email)
            ->send(new SendMailable($email));

        unlink(public_path('/tmp/contrato-' . $email . '.pdf'));

        return view('agradecimentos');
    }
}