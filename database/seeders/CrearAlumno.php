<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumnos;

class CrearAlumno extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $alu = new Alumnos();
        $alu->id = 1;
        $alu->no_cont = "T19030548";
        $alu->nombre = "Luis Mora Luna";
        $alu->correo = "drack@gmail.com";
        $alu->carrera = "TICS";
        $alu->tel = "7695895875";
        $alu->foto = "/storage/fotop/perfil.jpg";
        $alu->pass = "123";
        $alu->save();
    }
}
