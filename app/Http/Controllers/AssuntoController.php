<?php
namespace App\Http\Controllers;

use App\Assunto;
use Illuminate\Http\Request;
use DB;

class AssuntoController extends Controller
{
	protected function create(Request $request)
    {
        $assunto = new Assunto;
        $assunto->assunto      = $request->assunto;
        $assunto->save();
    }
}