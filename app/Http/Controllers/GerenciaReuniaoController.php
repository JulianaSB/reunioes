<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GerenciaReuniao;
use App\Reuniao;
use DB;

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
            DB::table('ata')->where('reuniao_id', $reuniao)->first()
        );
        $reuniaoDados = array(
            'reuniao' =>
            Reuniao::where('ID_Reuniao',$reuniao)->get()
        );
        $total = count(($reuniaoDados));
        if($total > 0){
            $ataDados = $ataDados;
        }else{
            $ataDados = "vazio";
        }
        var_dump($ataDados);
        die();
        return view('gerencia-ata', $reuniaoDados, $ataDados);
    }
}