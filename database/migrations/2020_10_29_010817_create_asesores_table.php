<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Asesores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 200)->nullable();
            $table->string('foto', 300)->nullable();
            $table->string('correo', 50)->nullable();
            $table->string('carrera', 50)->nullable();
            $table->string('mat', 500)->nullable();
            $table->string('met', 500)->nullable();
            $table->string('tel', 15)->nullable();
            $table->string('no_cont', 10)->nullable();
            $table->string('pass', 50)->nullable();
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
        Schema::dropIfExists('asesores');
    }
}
