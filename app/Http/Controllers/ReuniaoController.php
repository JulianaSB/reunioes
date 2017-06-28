<?php

namespace App\Http\Controllers;

use App\Reuniao;
use Illuminate\Http\Request;
use DB;
use Mail;
use App\Mail\Convite;

class ReuniaoController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function create()
    {
        $items = DB::table('Assunto')->get();

        $participantes = DB::table('users')->get();

        return view('reunioes.create', [
            'itemlist' => $items, 
            'participa' => $participantes
        ]);
    }

    public function store(Request $request)
    {
        $id = auth()->id();
        $request->participantes = implode(",",$request->participantes);
        $reuniao = new Reuniao;
        $reuniao->ID_Organizador= $id;
        $reuniao->Assunto       = $request->assunto;
        $reuniao->Tema          = $request->tema;
        $reuniao->Pautas        = $request->pautas;
        $reuniao->Descricao     = $request->descricao;
        $reuniao->Data_Hora     = $request->data_hora;
        $reuniao->Tipo_Reuniao  = $request->tipo_reuniao;
        $reuniao->Quorum        = $request->quorum;
        $reuniao->Segunda_Chamada = $request->segunda_chamada;
        $reuniao->Participantes = $request->participantes;
        $reuniao->save();
      $id = $request->participantes;                        
      $convidado = DB::table('users')->where('id', $id)->first();

      $mail=$convidado->email;   
       
      Mail::to($mail)->send(new Convite($request));

      return redirect('/logado');
    }
    
    public function sendMail(Request $request)
    {
    }
}
