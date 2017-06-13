<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;
Use App\Mail\Convite;
use App\User;
use App\Reuniao;
class ConviteController extends Controller
{ 

public function testMail(Request $request)
{
   // $mail = "a@a.a";
    //Mail::to($mail)->send(new Convite);
    //

  $id = $request->participantes;                        
  $convidado = DB::table('users')->where('id', $id)->first();

  $mail=$convidado->email;   
   
  Mail::to($mail)->send(new Convite($request));

  return redirect('/logado');
}
}