<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orcamento');
            $table->double("total");
            $table->string("cnpj");
            $table->date("date")->nullable();
            $table->string("company");
            $table->string("name_fantasy")->nullable();
            $table->string("activity")->nullable();
            $table->string("cnae_main")->nullable();
            $table->string("cnae_secondary")->nullable();
            $table->string("legal")->nullable();
            $table->string("address");
            $table->integer("number");
            $table->string("complement")->nullable();
            $table->string("cep");
            $table->string("district");
            $table->string("county");
            $table->string("uf");
            $table->string("email");
            $table->string("phone");
            $table->string("ente_federative")->nullable();
            $table->string("status")->nullable();
            $table->string("status_date")->nullable();
            $table->string("status_reason")->nullable();
            $table->string("special")->nullable();
            $table->string("special_date")->nullable();
            $table->string("share_capital")->nullable();
            $table->string("partner")->nullable();
            $table->string("qualification")->nullable();
            $table->string("service_start_month");
            $table->string("code");
            $table->integer('plan');
            $table->string("payment_day");
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
        Schema::dropIfExists('contratantes');
    }
}
