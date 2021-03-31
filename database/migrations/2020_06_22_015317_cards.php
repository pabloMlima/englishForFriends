<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('cards_id');
            $table->integer('usuarios_id');
            $table->foreign('usuarios_id')->references('usuarios_id')->on('usuarios');
            $table->integer('car_publico')->nullable();
            $table->text('car_texto')->nullable();
            $table->text('car_traducao')->nullable();
            $table->string('car_img', 45)->nullable();
            $table->string('car_img_traducao', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
