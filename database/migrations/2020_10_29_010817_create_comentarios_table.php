<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->string('foto', 300)->nullable();
            $table->string('nombre', 100)->nullable();
            $table->string('no_cont_alu', 10)->nullable();
            $table->string('no_cont_asesor', 10)->nullable();
            $table->string('comentario', 500)->nullable();
            $table->integer('puntuacion')->nullable();
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
        Schema::dropIfExists('comentarios');
    }
}
