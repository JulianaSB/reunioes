<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GerenciaReuniao;
use App\Reuniao;
use App\Ata;
use App\Assunto;

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

    public function addata ($reuniao) {
        $id = auth()->id();
        $ataDados = array(
            'ata' =>
            Ata::where('reuniao_id', $reuniao)->get()
        );
        $reuniaoDados= array(
            'reuniao' =>
            Reuniao::where('ID_Reuniao',$reuniao)->get()
        );

        $total = count(($ataDados));
        if($total > 0){
            $ataDados = $ataDados;
        }else{
            $ataDados = "";
        }
        $id = 1;
        $assunto = array(
            'assuntos' =>
            Assunto::where('id', $id)->get()
        );
        
        // var_dump($assunto);
        // die();
        return view('reunioes.gerencia-ata', $reuniaoDados, $ataDados, $assunto);
    }
}