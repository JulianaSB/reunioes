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
