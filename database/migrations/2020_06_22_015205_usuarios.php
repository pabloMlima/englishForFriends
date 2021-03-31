<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('usuarios_id');
            $table->string('usu_nome', 45);
            $table->string('usu_senha', 60);
            $table->string('usu_email', 30);
            $table->integer('usu_confirmacao_email')->nullable();
            $table->string('usu_token', 45)->nullable();
            $table->string('usu_avatar', 45)->nullable();
            $table->string('usu_genero', 20)->nullable();
            $table->datetime('usu_data_cadastro')->nullable();
            $table->datetime('usu_data_alteracao')->nullable();
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
        Schema::dropIfExists('usuarios');
    }
}
