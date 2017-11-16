<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParticipaModel;
use App\Reuniao;
use DB;

class ParticipaController extends Controller
{
    public function index()
    {
    	$id = auth()->id();

        $itens= array(
            'itensparticipa' =>
            Reuniao::where('Participantes',$id)->get());
        return view('reunioes.participeMeeting', $itens);
    }

    public function edit($reuniao)
    {
        $item= array(
            'itensparticipa' =>
            Reuniao::where('ID_Reuniao',$reuniao)->get());
        return view('reunioes.editMeeting', $item);
    }

    public function update(Request $request, $reuniao)
    {
     	DB::table('reunioes')
             ->where('ID_Reuniao', $reuniao)
             ->update(['Pautas' => $request->pauta]);
    }
}
