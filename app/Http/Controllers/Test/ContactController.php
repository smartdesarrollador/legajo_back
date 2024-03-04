<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\TestContact;
use Mail;

class ContactController extends Controller
{
     public function sendContactForm(Request $request)
    {
        $data['nombre'] = $request->nombre;


    Mail::send('mails.contact', $data, function ($message) use ($data) {
      $message->to('obed@manatums.com', $data['nombre'])
      ->subject("Titulo del Mensaje");
    });
    return response()->json([
      'Success' => 'Excelente email enviado..',
      'code' => '200',
    ],200);


    }
}
