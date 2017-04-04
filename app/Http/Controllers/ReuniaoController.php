<?php

namespace App\Http\Controllers;

use App\Reuniao;
use Illuminate\Http\Request;

class ReuniaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reunioes.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reunioes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reuniao = new Reuniao;
        $reuniao->ID_Organizador = '1';
        $reuniao->Assunto       = $request->assunto;
        $reuniao->Tema          = $request->tema;
        $reuniao->Pautas        = $request->pautas;
        $reuniao->Descricao     = $request->descricao;
        $reuniao->Data_Hora     = $request->data_hora;
        $reuniao->Tipo_Reuniao  = $request->tipo_reuniao;
        $reuniao->Segunda_Chamada = $request->segunda_chamada;
        $reuniao->Participantes = $request->participantes;
        $reuniao->save();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
