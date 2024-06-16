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
        Schema::create('restaurante', function (Blueprint $table) {
            $table->increments("idRes");
            $table->string("nombre",100)->unique();
            $table->string("categoria",100);
            $table->unsignedInteger("idUsu");
            $table->unsignedInteger("idCiu");
        });
        Schema::table("restaurante",function($table) {
            $table->foreign("idUsu")->references("idUsu")->on("usuario")->onDelete('cascade');
            $table->foreign("idCiu")->references("idCiu")->on("ciudad")->onDelete('cascade');
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurante');
    }
};
