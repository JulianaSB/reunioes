<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AtaReuniao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ata', function($table){
            $table->increments('ID_Ata');
            $table->integer('reuniao_id')->unsigned();
            $table->foreign('reuniao_id')->references('ID_Reuniao')->on('Reunioes');
            $table->longText('ata_Reuniao');
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
        Schema::drop('Ata');
    }
}
