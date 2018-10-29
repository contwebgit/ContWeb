<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracoesController extends Controller
{
    public function uploadTemplateContrato(Request $request){
        $file = $request->file('template');

        if(!empty($file)){
            $ext = $request->template->extension();

            $name = "contrato.$ext";

            @unlink(public_path() . '/contrato/' . $name);

            $file->move(public_path() . '/contrato/', $name);
        }

        return redirect()->route('admin');
    }
}
