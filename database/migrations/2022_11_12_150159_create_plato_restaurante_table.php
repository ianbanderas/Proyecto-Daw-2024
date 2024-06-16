<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plato_restaurante', function (Blueprint $table) {
            $table->unsignedInteger("idRes");
            $table->unsignedInteger("idPla");
            $table->integer('valoracion');
            $table->string("comentario",255);
        });
        Schema::table("restaurante",function($table) {
            $table->foreign("idRes")->references("idRes")->on("restaurante")->onDelete('cascade');
            $table->foreign("idPla")->references("idPla")->on("platos")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plato_restaurante');
    }
};
