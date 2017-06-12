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
   
    public function edicao()
        {
            
             return view('/reunioes.edit-reuniao');
        }
    public function update(Request $request)
    {
        $id = $request->query('id');
    	DB::table('reunioes')
            ->where('ID_Reuniao', $id)
            ->update(['Assunto' => $request->$assunto]);
    }
    public function destroy(Article $article)
    {
    	return (string) $artcile->delete();
    }
}
