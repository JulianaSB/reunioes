<?php

use Illuminate\Database\Seeder;
use App\Reuniao;

class ReuniaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reuniao::create([
        	'ID_Organizador' => '1',
            'Assunto' => '1',
            'Tema' => 'Tema 1',
            'Pautas' => 'Pauta 1',
            'Descricao' => 'Descricao 1',
            'Segunda_Chamada' => '0',
            'Participantes' => '2',
            'Data_Hora' => '08/07/2017'
        ]);

        Reuniao::create([
            'ID_Organizador' => '2',
            'Assunto' => '1',
            'Tema' => 'Tema 2',
            'Pautas' => 'Pauta 2',
            'Descricao' => 'Descricao 2',
            'Segunda_Chamada' => '0',
            'Participantes' => '1',
            'Data_Hora' => '08/07/2017'
        ]);
    }
}
