<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Options;
use App\Models\Alumnos;
use App\Models\Asesores;
use App\Models\Familiar;
use App\Models\Historial_clinico;
use App\Models\Direccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use ParagonIE\ConstantTime\Base64;
use PhpParser\Node\Stmt\Echo_;
use App\Models\Social;
use App\Models\Datos_familiares;
use App\Models\Personales;

class SesionController extends Controller
{
  public function administrador(Request $request)
  {
    $admin = Administrador::where('matricula', $request->matricula)->where('pass', $request->pass)->first();
    if ($admin == null) {
      return redirect()->route('administrador_log')->with('error', 'Verifica los datos');
    } else {
      $ur = '.' . $admin->foto;
      if (!file_exists($ur)) {
        $admin->foto = "/storage/fotop/perfil.jpg";
        $admin->save();
      }
      return redirect()->route('administrador.perfil', Crypt::encrypt($admin->matricula));
    }
  }

  public function asesores(Request $request)
  {
    $alu = Asesores::where('no_cont', $request->no_cont)->where('pass', $request->pass)->first();
    if ($alu == null) {
      return redirect()->route('asesores_log')->with('error', 'Verifica los datos');
    } else {
      $ur = '.' . $alu->foto;
      if (!file_exists($ur)) {
        $alu->foto = "/storage/fotop/perfil.jpg";
        $alu->save();
      }
      return redirect()->route('asesores.perfil', Crypt::encrypt($alu->no_cont));
    }
  }

  public function alumnos(Request $request)
  {
    $alu = Alumnos::where('no_cont', $request->no_cont)->where('pass', $request->pass)->first();
    if ($alu == null) {
      return redirect()->route('alumnos_log')->with('error', 'Verifica los datos');
    } else {
      $ur = '.' . $alu->foto;
      if (!file_exists($ur)) {
        $alu->foto = "/storage/fotop/perfil.jpg";
        $alu->save();
      }
      return redirect()->route('alumnos.perfil', Crypt::encrypt($alu->no_cont));
    }
  }
}
