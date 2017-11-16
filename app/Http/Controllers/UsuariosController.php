<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;     
 

class UsuariosController extends Controller {
    
   public function store(Request $request)
    {
            // store
            $user = new User;
            $user->name       =  $request->name;
            $user->email      =  $request->email;
            $user->tipo       =  '2';
            $user->password   = bcrypt($request->password);
            $user->save();
           return view('logado');
        
    }
}