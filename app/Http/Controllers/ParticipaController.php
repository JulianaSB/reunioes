<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParticipaModel;
use DB;

class ParticipaController extends Controller
{
    public function index()
    {
    	// $query = DB::table('gerencia_reuniaos');
     //    $query->where('tipo', '==', 2);
     //     var_dump($query);
     //     die();
         $id = auth()->id();

         $itens= array(
             'itensparticipa' => 
             DB::table('reunioes')
              ->join('gerencia_reuniaos', 'gerencia_reuniaos.reuniao_id', '=', 'reunioes.ID_Reuniao')
              ->select('reunioes.Assunto','reunioes.Tema','reunioes.Data_Hora' )->where(DB::raw('gerencia_reuniaos.tipo = 2 AND gerencia_reuniaos.usuario_id = "$id"'))->get());
                // 'gerencia_reuniaos.tipo','=','2',  '$id', '=', 'gerencia_reuniaos.usuario_id')
              
              // DB::table('gerencia_reuniaos')->join('reunioes', 'users.id', '=', 'contacts.user_id')->where('tipo', '==', '2')
              // );
         var_dump($itens);
         die();
         return view('reunioes.reunioes-participa', $itens);
    }
   
     // public function scopeParticipante($query){
     //    return $query->where('tipo', '=', 2);
     // }
    // public function store(Request $request)
    // {
    // 	return Article::create($request->all());
    // }
    // public function create()
    // {

       
    // }
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
