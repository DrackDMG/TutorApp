<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Administrador;

class CrearAdministrador extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $alu = new Administrador();
        $alu->id = 1;
        $alu->matricula = "123";
        $alu->nombre = "Drack Morales Gonzalez";
        $alu->academia = "Tics";
        $alu->correo = "drack@gmail.com";
        $alu->pass = "123";
        $alu->foto = "/storage/fotop/perfil.jpg";
        $alu->save();
    }
}
