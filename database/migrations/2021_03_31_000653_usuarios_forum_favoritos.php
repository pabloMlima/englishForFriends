<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsuariosForumFavoritos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_forum_favoritos', function (Blueprint $table) {
            $table->increments('usuarios_forum_favoritos_id');
            $table->integer('usuarios_id');
            $table->foreign('usuarios_id')->references('usuarios_id')->on('usuarios');
            $table->integer('forum_conteudos_id');
            $table->foreign('forum_conteudos_id')->references('forum_conteudos_id')->on('forum_conteudos');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_forum_favoritos');
    }
}
