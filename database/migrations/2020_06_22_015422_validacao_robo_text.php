<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ValidacaoRoboText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validacao_robo_text', function (Blueprint $table) {
            $table->increments('validacao_robo_text_id');
            $table->text('val_rob_tex_frase')->nullable();
            $table->integer('validacao_robo_traducao_id');
            $table->foreign('validacao_robo_traducao_id')->references('validacao_robo_traducao_id')->on('validacao_robo_traducao');
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
        Schema::dropIfExists('validacao_robo_text');
    }
}
