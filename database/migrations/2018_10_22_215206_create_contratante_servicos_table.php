<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratanteServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratante_servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('servico');
            $table->integer('orcamento');
            $table->string('cpf');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('cep');
            $table->string('estado')->nullable();
            $table->string('cidade')->nullable();
            $table->string('logradouro');
            $table->integer('numero');
            $table->string('complemento');
            $table->string('bairro');
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
        Schema::dropIfExists('contratante_servicos');
    }
}
