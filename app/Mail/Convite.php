<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Reuniao;

class Convite extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
       //
    }

    public function build(Request $request)
    {
            $Convite= array(
             
            'Assunto' => $request->assunto,
            'Tema' => $request->tema,
            'Pauta' => $request->pauta,
            'Descricao' => $request->descricao,
            'Data_Hora' => $request->data_hora,
            'Tipo_Reuniao' => $request->tipo_reuniao,
            'Quorum' => $request->quorum,
            'segunda_chamada' => $request->segunda_chamada,
            'Participantes' => $request->participantes,
             );
    
        return $this->view('email.convite', $Convite);
    }
}