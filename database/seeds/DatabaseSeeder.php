<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AssuntoTableSeeder::class);
        $this->call(ReuniaoTableSeeder::class);
        $this->call(AtaTableSeeder::class);
    }
}
