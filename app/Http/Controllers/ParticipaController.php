<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParticipaModel;

class ParticipaController extends Controller
{
    public function index()
    {
    	 return view('reunioes.reunioes-participa');
    }
    public function store(Request $request)
    {
    	return Article::create($request->all());
    }
    public function show(Article $article)
    {
    	$itens= array(
    		'itensparticipa' => 
    		DB::table('gerencia_reuniaos')
            ->join('reunioes', 'gerencia_reuniaos.reuniao_id', '=', 'reunioes.ID_Reuniao')
            ->join('users', 'reunioes.ID_Organizador', '=', 'user.id')
            ->select('reunioes.Assunto','reunioes.Tema','users.name','reunioes.Data_Hora' )->where('usuario_id', '$id','tipo','2')
            );
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
