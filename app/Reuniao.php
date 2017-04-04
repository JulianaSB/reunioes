<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
	/*protected $fillable = [
        'ID_Organizador',
        'Assunto',
        'Tema',
        'Pautas',
        'Descricao',
        'Tipo_Reuniao',
        'Quorum',
        'Segunda_Chamada',
        'Participantes',
        'Data_Hora',
    ];*/
    
	protected $table = 'Reunioes';
}
