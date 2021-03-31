<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ValidacaoRoboTraducao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validacao_robo_traducao', function (Blueprint $table) {
            $table->increments('validacao_robo_traducao_id');
            $table->string('val_rob_tra_mensagem', 60);
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
        Schema::dropIfExists('validacao_robo_traducao');
    }
}
