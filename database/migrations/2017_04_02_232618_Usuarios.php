<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Usuarios', function($table){
            $table->increments('ID_Usuario');
            $table->string('Nome', 30);
            $table->tinyInteger('Cpf');
            $table->tinyInteger('RA');
            $table->string('Setor', 30);
            $table->string('Email');
            $table->string('Senha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Usuarios');
    }
}
