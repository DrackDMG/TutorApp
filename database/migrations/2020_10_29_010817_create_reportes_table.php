<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Reportes', function (Blueprint $table) {
            $table->id();
            $table->string('no_cont', 200)->nullable();
            $table->string('nombre', 300)->nullable();
            $table->string('materia', 50)->nullable();
            $table->string('tema', 50)->nullable();
            $table->date('fecha')->nullable();
            $table->string('no_cont2', 15)->nullable();
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
        Schema::dropIfExists('reportes');
    }
}
