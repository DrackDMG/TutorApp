<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asesores;

class CrearAsesor extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $alu = new Asesores();
        $alu->id = 1;
        $alu->no_cont = "T19030547";
        $alu->nombre = "Paola Perez Lopez";
        $alu->correo = "drack@gmail.com";
        $alu->carrera = "TICS";
        $alu->tel = "7695895875";
        $alu->mat = "Calculo, Programacion";
        $alu->foto = "/storage/fotop/perfil.jpg";
        $alu->pass = "123";
        $alu->save();
    }
}
