<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParticipaModel;
use DB;

class ParticipaController extends Controller
{
    public function index()
    {
    	 $id = auth()->id();

         $itens= array(
             'itensparticipa' => 
             DB::table('reunioes')
              ->join('gerencia_reuniaos', 'gerencia_reuniaos.reuniao_id', '=', 'reunioes.ID_Reuniao')
              ->select('reunioes.Assunto','reunioes.Tema','reunioes.Data_Hora' )->where('gerencia_reuniaos.tipo', '2','gerencia_reuniaos.usuario_id', '$id')->get());
         return view('reunioes.reunioes-participa', $itens);
    }
   

    public function update(Request $request, Article $article)
    {
    	$article->update($request->all());
    	return $article;
    }
    public function destroy(Article $article)
    {
    	return (string) $artcile->delete();
    }
}
