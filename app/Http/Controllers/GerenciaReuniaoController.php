<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GerenciaReuniao;
use App\Reuniao;

class GerenciaReuniaoController extends Controller {
    
    public function index() {
        $id = auth()->id();

        $itens= array(
            'itensgerencia' =>
            Reuniao::where('ID_Organizador',$id)->get()
        );
        return view('reunioes.manageMeeting', $itens);
    }

    public function edit ($reuniao) {
        $item= array(
            'itensparticipa' =>
            Reuniao::where('ID_Reuniao',$reuniao)->get()
        );
        return view('reunioes.edit-reuniao', $item);
    }
}