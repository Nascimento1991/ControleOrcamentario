<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendaMensalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renda_mensal', function (Blueprint $table) {
            $table->increments('COD_RENDA_MENSAL');
            $table->integer('ANO_RENDA_MENSAL')->nullable(false);
            $table->string('MES_RENDA_MENSAL', 2)->nullable(false);
            $table->string('NOME_RENDA_MENSAL')->nullable(false);
            $table->decimal('VALOR_RENDA_MENSAL', 15, 2)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renda_mensal');
    }
}
