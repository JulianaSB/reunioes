<?php

use Illuminate\Database\Seeder;
use App\Assunto;

class AssuntoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		Assunto::create([
			'Assunto' => 'Financeiro',
		]);

		Assunto::create([
			'Assunto' => 'Estudantil',
		]);
	}
}
