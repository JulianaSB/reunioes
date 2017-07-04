<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'João',
        	'email' => 'joao@gmail.com',
        	'ra' => '1234567',
        	'setor' => 'Financeiro',
        	'cpf' => '38751606811',
        	'password' => bcrypt('123456')
        ]);

        User::create([
        	'name' => 'Maria',
        	'email' => 'maria@gmail.com',
        	'ra' => '2345678',
        	'setor' => 'Estudanti',
        	'cpf' => '38751606812',
        	'password' => bcrypt('123456')
        ]);
    }
}
