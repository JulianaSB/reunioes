<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParticipaModel;
use DB;
use App\Reuniao;

class ParticipaController extends Controller
{
    public function index()
    {
    	 $id = auth()->id();

         $itens= array(
             'itensparticipa' =>
             Reuniao::where('Participantes',$id)->get());
         return view('reunioes.reunioes-participa', $itens);
    }
   
    public function edit($reuniao)
        {
          $item= array(
             'itensparticipa' =>
             Reuniao::where('ID_Reuniao',$reuniao)->get());
         return view('reunioes.edit-reuniao', $item);
        }
    public function update($reuniao)
     {
     	DB::table('reunioes')
             ->where('ID_Reuniao', $reuniao)
             ->update(['Pauta' => $request->$pauta]);
     }
    // public function destroy(Article $article)
    // {
    // 	return (string) $artcile->delete();
    // }
}
