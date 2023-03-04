<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    //nombre de la tabla
    protected $table="alumnos";
    //datos que se mostraran el los objetos json
    protected $fillable=["'nombre', 'edad', 'direccion', telefono", 'carrera'];


}
