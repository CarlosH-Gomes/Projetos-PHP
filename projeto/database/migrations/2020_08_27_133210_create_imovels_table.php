<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovels', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('locador_id')->unsigned();
            $table->foreign('locador_id')->references('id')->on('locadors');
            $table->integer('cidade_imovel_id')->unsigned();
            $table->foreign('cidade_imovel_id')->references('id')->on('cidades');
            $table->string('Rua',100);
            $table->string('Bairro',100);
            $table->string('CEP',9);
            $table->string('Numero',8);
            $table->string('Complemento',20);
            $table->string('Valor',20);
            $table->string('Tipo',20);
            $table->string('Estilo',20);
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
        Schema::dropIfExists('imovels');
    }
}
