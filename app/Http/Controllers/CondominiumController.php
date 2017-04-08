<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;

class CondominiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $condominium = DB::select('EXEC SP_LISTAR_CONDOMINIOS null');
        return view ('condominio.index', ['condominium' => $condominium]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('condominio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $condominium = DB::insert("EXEC SP_ATUALIZAR_CONDOMINIO null, '$request->empresa', '$request->condominio', '$request->endereco', '$request->bairro', '$request->cidade', '$request->estado', '$request->telefone', '$request->responsavel', '$request->sindico', '$request->zelador', '$request->tipo_portaria', '$request->ip_condominio', '$request->dns_condominio', '$request->dados','$request->status'");
        if ($condominium) {
            return response()->json(['status' => 'SUCCESS']);
        } else {
            return response()->json(['status' => 'ERROR']);
        }
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
        $condominium = DB::select("EXEC SP_LISTAR_CONDOMINIOS");
        foreach ($condominium as $condominio) {
            if ($condominio->ID_CONDOMINIO == $id) {
                $condominium = $condominio;
            }
        };
        $empresas = DB::select("EXEC SP_LISTAR_REVENDAS_COMBO");
        return view('condominio.edit', [
            'condominio' => $condominium,
            'empresas'  =>  $empresas,
        ]);
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
        $condominium = DB::update("EXEC SP_ATUALIZAR_CONDOMINIO '$id', '$request->empresa', '$request->condominio', '$request->endereco', '$request->bairro', '$request->cidade', '$request->uf', '$request->telefone', '$request->responsavel', '$request->sindico', '$request->zelador', '$request->tipo_portaria', '$request->ip_condominio', '$request->dns_condominio', '$request->dados','$request->status'");
        if ($condominium) {
            return response()->json(['status' => 'SUCCESS']);
        } else {
            return response()->json(['status' => 'ERROR']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $condominium = DB::delete("EXEC SP_EXCLUIR_REGISTROS TBL_CONDOMINIOS, ID_CONDOMINIO ,'$id', L");
        if ($condominium) {
            return response()->json(['status' => 'SUCCESS']);
        } else {
            return response()->json(['status' => 'ERROR']);
        }
    }
}
