<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDespesaMensalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despesa_mensal', function (Blueprint $table) {
            $table->increments('COD_DESPESA_MENSAL');
            $table->integer('ANO_DESPESA_MENSAL')->nullable(false);
            $table->string('MES_DESPESA_MENSAL', 2)->nullable(false);
            $table->string('NOME_DESPESA_MENSAL')->nullable(false);
            $table->decimal('VALOR_DESPESA_MENSAL', 15, 2)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('despesa_mensal');
    }
}
