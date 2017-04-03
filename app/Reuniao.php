<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
	protected $table = 'reuniao';

    protected $fillable = [
    'descricao', 
    'data',
    ];
}
