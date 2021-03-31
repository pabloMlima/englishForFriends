<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForumConteudos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_conteudos', function (Blueprint $table) {
            $table->increments('forum_conteudos_id');
            $table->integer('car_publico')->nullable();
            $table->integer('usuarios_id');
            $table->foreign('usuarios_id')->references('usuarios_id')->on('usuarios');
            $table->integer('forum_tipos_id');
            $table->foreign('forum_tipos_id')->references('forum_tipos_id')->on('forum_tipos');
            $table->string('for_con_titulo', 45)->nullable();
            $table->text('for_con_texto')->nullable();
            $table->string('for_con_link', 255)->nullable();
            $table->datetime('for_con_data_cadastro')->nullable();
            $table->text('for_con_traducao')->nullable();
            $table->integer('for_con_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_conteudos');
    }
}
