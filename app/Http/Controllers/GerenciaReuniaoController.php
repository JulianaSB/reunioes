<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GerenciaReuniao;
use App\Reuniao;

class GerenciaReuniaoController extends Controller
{
    public function index() {
        $id = auth()->id();

        $itens= array(
             'itensgerencia' =>
             Reuniao::where('ID_Organizador',$id)->get()
             );
        return view('reunioes.manage', $itens);
    }

    public function store(Request $request) {
        return Article::create($request->all());
    }

    public function update(Request $request, Article $article) {
        $article->update($request->all());
        return $article;
    }

    public function destroy(Article $article) {
        return (string) $artcile->delete();
    }
}