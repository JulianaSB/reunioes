<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reuniao;

class ReuniaoController extends Controller
{

    public function index() {

      $reunioes = Reuniao::all();
      return view('reuniao.index', compact('reunioes'));

    }

    public function create() {

      return view('reuniao.create');

    }

}
