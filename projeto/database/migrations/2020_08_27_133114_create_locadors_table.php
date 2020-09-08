<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locadors', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('cidade_locador_id')->unsigned();
            $table->foreign('cidade_locador_id')->references('id')->on('cidades');
            $table->string('nome',100);
            $table->string('CPF',12);
            $table->string('RG',10);
            $table->string('sexo',10);
            $table->date('Data_Nasci',100);
            $table->string('Telefone',12);
            $table->string('email',50);
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
        Schema::dropIfExists('locadors');
    }
}
