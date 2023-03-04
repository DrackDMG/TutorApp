<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use App\Models\Asesores;
use OpenAI\Client;
use App\Models\Comentarios;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use OpenAI;

class AlumnosController extends Controller
{
    public function index()
    {
    }
    public function perfil($no_cont)
    {
        $no_cont =  Crypt::decrypt($no_cont);
        $alu = Alumnos::where('no_cont', $no_cont)->first();
        $ur = '.' . $alu->foto;
        if (!file_exists($ur)) {
            $alu->foto = "/storage/fotop/perfil.jpg";
            $alu->save();
        }
        return view('alumnos.index', compact('alu'));
    }
    public function edit($id)
    {
        $id =  Crypt::decrypt($id);
        $alu = Alumnos::find($id);
        return view('alumnos.edperfil', compact('alu'));
    }
    public function update(Request $request, $id)
    {
        $alu = Alumnos::find($id);
        $alu->tel = $request->tel;
        $alu->correo = $request->email;
        $alu->save();
        return redirect()->route('alumnos.perfil', Crypt::encrypt($alu->no_cont));
    }
    //parte de foto
    public function foto($id)
    {
        $id =  Crypt::decrypt($id);
        $alu = Alumnos::find($id);
        return view('Alumnos.foto', compact('alu'));
    }
    public function updatefoto(Request $request, $id)
    {
        $alu = Alumnos::find($id);
        $request->validate(['file' => 'required']);
        $archextension = $request->file->getClientOriginalExtension();
        $archextension = strtolower($archextension);
        if ($archextension == 'jpg' || $archextension == 'png' || $archextension == 'jpeg') {
            $ur = '.' . $alu->foto;
            if (file_exists($ur)) {
                if ($alu->foto == '/storage/fotop/perfil.jpg') {
                } else {
                    unlink($ur);
                }
            }
            $im = $request->file('file')->store('public/fotop');
            $url = Storage::url($im);
            $alu->foto = $url;
            $alu->save();
            return redirect()->route('alumnos.perfil', Crypt::encrypt($alu->no_cont))->with('success', 'La imagen se subio correctamente');
        } else {
            return redirect()->route('alumnos.foto', Crypt::encrypt($alu->id))->with('error', 'La extencion no es valida selecciona un archivo jpg, png, jpeg');
        }
    }
    //ver asesores
    public function asesores($id, Request $request)
    {
        $id =  Crypt::decrypt($id);
        if ($request) {
            $alu = Alumnos::find($id);
            $bus = trim($request->get('buscar'));

            $asesores = Asesores::where('mat', 'like', '%' . $bus . '%')->orderBy('id', 'asc')->get();
            return view('alumnos.asesores', compact('asesores', 'alu'));
        }
        $alu = Alumnos::find($id);
        $asesores = Asesores::all();
        return view('alumnos.asesores', compact('asesores', 'alu'));
    }
    public function veras($id, $idas)
    {

        $alu = Alumnos::find($id);
        $alumno = Asesores::find($idas);
        $comentariop = Comentarios::where('no_cont_asesor', $alumno->no_cont)->where('no_cont_alu', $alu->no_cont)->get();
        $comentarios = Comentarios::where('no_cont_asesor', $alumno->no_cont)->where('no_cont_alu', '!=', $alu->no_cont)->get();
        $comentariost = Comentarios::where('no_cont_asesor', $alumno->no_cont)->get();
        return view('alumnos.veras', compact('comentariop', 'comentarios', 'comentariost', 'alu', 'alumno'));
    }
    //comentarios
    public function comentarios($id, $idas)
    {
        $ase = Asesores::find($idas);
        $alu = Alumnos::find($id);
        $com = Comentarios::where('no_cont_alu', $alu->no_cont)->where('no_cont_asesor', $ase->no_cont)->first();
        if ($com != null) {
            $idcom = $com->id;
            $comentario = $com->comentario;
            $puntuacion = $com->puntuacion;
        } else {
            $idcom = -1;
            $comentario = '';
            $puntuacion = '';
        }
        return view('alumnos.comentarios', compact('idcom', 'ase', 'comentario', 'puntuacion', 'alu'));
    }
    //editar
    public function updatecomen(Request $request, $id, $idas, $idcom)
    {
        $alu = Alumnos::find($id);
        $ase = Asesores::find($idas);
        $com = Comentarios::find($idcom);
        if ($com == null) {
            $com = new Comentarios();
            $com->foto = $alu->foto;
            $com->nombre = $alu->nombre;
            $com->no_cont_asesor = $ase->no_cont;
            $com->no_cont_alu = $alu->no_cont;
            $com->puntuacion = $request->puntuacion;
            $com->comentario = $request->comentario;
            $com->save();
        }
        $com->foto = $alu->foto;
        $com->nombre = $alu->nombre;
        $com->no_cont_asesor = $ase->no_cont;
        $com->no_cont_alu = $alu->no_cont;
        $com->puntuacion = $request->puntuacion;
        $com->comentario = $request->comentario;
        $com->save();
        return redirect()->route('alumnos.veras', [$id, $idas]);
    }
    //eliminar
    public function eliminarcomen($id, $idas, $idcom)
    {
        $com = Comentarios::find($idcom);
        $com->delete();
        return redirect()->route('alumnos.veras', [$id, $idas]);
    }
}
