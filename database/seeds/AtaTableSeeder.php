<?php

use Illuminate\Database\Seeder;
use App\Ata;

class AtaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ata::create([
        	'reuniao_id' => '1',
        	'ata_Reuniao' => 'Pauta1
        	Pauta2

        	Participantes:
        	João
        	Maria',
        ]);

        Ata::create([
        	'reuniao_id' => '2',
        	'ata_Reuniao' => 'Pauta1
        	Pauta2

        	Participantes:
        	João
        	Maria',
        ]);
    }
}
