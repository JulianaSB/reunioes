<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reunioes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Reunioes', function($table){
            $table->increments('ID_Reuniao');
            $table->integer('ID_Organizador')->unsigned();
            $table->foreign('ID_Organizador')->references('id')->on('users');
            $table->string('Assunto');
            $table->string('Tema');
            $table->string('Pautas');
            $table->string('Descricao');
            $table->string('Tipo_Reuniao');
            $table->tinyInteger('Quorum');
            $table->tinyInteger('Segunda_Chamada');
            $table->string('Participantes');
            $table->string('Data_Hora');
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
        Schema::drop('Reunioes');
    }
}
