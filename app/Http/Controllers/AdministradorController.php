<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Alumnos;
use App\Models\Asesores;
use App\Models\Comentarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class AdministradorController extends Controller
{
    public function index()
    {
    }
    public function perfil($matricula)
    {
        $matricula =  Crypt::decrypt($matricula);
        $admin = Administrador::where('matricula', $matricula)->first();
        $ur = '.' . $admin->foto;
        if (!file_exists($ur)) {
            $admin->foto = "/storage/fotop/perfil.jpg";
            $admin->save();
        }
        return view('administrador.index', compact('admin'));
    }
    //edperfil
    public function edit($id)
    {
        $id =  Crypt::decrypt($id);
        $admin = Administrador::find($id);
        return view('administrador.edperfil', compact('admin'));
    }
    public function update(Request $request, $id)
    {
        $admin = Administrador::find($id);
        $admin->correo = $request->email;
        $admin->save();
        return redirect()->route('administrador.perfil', Crypt::encrypt($admin->matricula));
    }
    //parte de foto
    public function foto($id)
    {
        $id =  Crypt::decrypt($id);
        $admin = Administrador::find($id);
        return view('administrador.foto', compact('admin'));
    }
    public function updatefoto(Request $request, $id)
    {
        $admin = Administrador::find($id);
        $request->validate([
            'file' => 'required'
        ]);
        $archextension = $request->file->getClientOriginalExtension();
        $archextension = strtolower($archextension);
        if ($archextension == 'jpg' || $archextension == 'png' || $archextension == 'jpeg') {
            $ur = '.' . $admin->foto;
            if (file_exists($ur)) {
                if ($admin->foto == '/storage/fotop/perfil.jpg') {
                } else {
                    unlink($ur);
                }
            }
            $im = $request->file('file')->store('public/fotop');
            $url = Storage::url($im);
            $admin->foto = $url;
            $admin->save();
            return redirect()->route('administrador.perfil', Crypt::encrypt($admin->matricula))
                ->with('success', 'La imagen se subio correctamente');
        } else {
            return redirect()->route('administrador.foto', Crypt::encrypt($admin->id))
                ->with('error', 'La extencion no es valida selecciona un archivo jpg, png, jpeg');
        }
    }
    //Alumnos
    public function alumnos($id, Request $request)
    {
        if ($request) {
            $admin = Administrador::find($id);
            $bus = trim($request->get('buscar'));

            $alumnos = Alumnos::where('no_cont', 'like', '%' . $bus . '%')
                ->orderBy('id', 'asc')->get();
            return view('administrador.alumnos', compact('alumnos', 'admin'));
        }
        $admin = Administrador::find($id);
        $alumnos = Alumnos::all();
        return view('administrador.alumnos', compact('alumnos', 'admin'));
    }
    //crear
    public function crearal($id)
    {
        $admin = Administrador::find($id);
        return view('administrador.crearal', compact('admin'));
    }
    public function guardaral(Request $request, $id)
    {
        $admin = Administrador::find($id);
        $alumn = Alumnos::where('no_cont', $request->no_cont)->first();
        if ($alumn == null) {
            $alu = new Alumnos();
            $alu->nombre = $request->nombre;
            $alu->no_cont = $request->no_cont;
            $alu->correo = $request->correo;
            $alu->tel = $request->tel;
            $alu->pass = $request->pass;
            $alu->carrera = $request->carrera;
            $alu->foto = "/storage/fotop/perfil.jpg";
            $alu->save();
            return redirect()->route('administrador.alumnos', $admin->id)->with('success', 'Alumno Agregado');
        } else {

            return redirect()->route('administrador.crearal', $admin->id)->with('error', 'Ya existe un Alumno con ese numero de control');
        }
    }
    //editar
    public function editaral($id, $idal)
    {
        $admin = Administrador::find($id);
        $alumno = Alumnos::find($idal);
        return view('administrador.editaral', compact('admin', 'alumno'));
    }
    public function updateal(Request $request, $id)
    {
        $admin = Administrador::find($id);
        $alu = Alumnos::where('no_cont', $request->no_cont)->first();
        $alu->nombre = $request->nombre;
        $alu->no_cont = $request->no_cont;
        $alu->correo = $request->correo;
        $alu->tel = $request->tel;
        $alu->pass = $request->pass;
        $alu->carrera = $request->carrera;
        $alu->save();
        return redirect()->route('administrador.alumnos', $admin->id)->with('success', 'Alumno Editado');
    }
    //eliminar
    public function eliminaral($id, $idal)
    {
        $admin = Administrador::find($id);
        $alumno = Alumnos::find($idal);
        $alumno->delete();
        return redirect()->route('administrador.alumnos', $admin->id);
    }

    //Asesores
    public function asesores($id, Request $request)
    {
        if ($request) {
            $admin = Administrador::find($id);
            $bus = trim($request->get('buscar'));

            $asesores = Asesores::where('no_cont', 'like', '%' . $bus . '%')
                ->orderBy('id', 'asc')->get();
            return view('administrador.asesores', compact('asesores', 'admin'));
        }
        $admin = Administrador::find($id);
        $asesores = Asesores::all();
        return view('administrador.asesores', compact('asesores', 'admin'));
    }
    //crear
    public function crearas($id)
    {
        $admin = Administrador::find($id);
        return view('administrador.crearas', compact('admin'));
    }
    public function guardaras(Request $request, $id)
    {
        $admin = Administrador::find($id);
        $alumn = Asesores::where('no_cont', $request->no_cont)->first();
        if ($alumn == null) {
            $alu = new Asesores();
            $alu->nombre = $request->nombre;
            $alu->no_cont = $request->no_cont;
            $alu->correo = $request->correo;
            $alu->tel = $request->tel;
            $alu->pass = $request->pass;
            $alu->mat = $request->mat;
            $alu->carrera = $request->carrera;
            $alu->foto = "/storage/fotop/perfil.jpg";
            $alu->save();
            return redirect()->route('administrador.asesores', $admin->id)->with('success', 'Asesor Agregado');
        } else {

            return redirect()->route('administrador.crearas', $admin->id)->with('error', 'Ya existe un Asesor con ese numero de control');
        }
    }
    //editar
    public function editaras($id, $idas)
    {
        $admin = Administrador::find($id);
        $alumno = Asesores::find($idas);
        return view('administrador.editaras', compact('admin', 'alumno'));
    }
    public function updateas(Request $request, $id)
    {
        $admin = Administrador::find($id);
        $alu = Asesores::where('no_cont', $request->no_cont)->first();
        $alu->nombre = $request->nombre;
        $alu->no_cont = $request->no_cont;
        $alu->correo = $request->correo;
        $alu->tel = $request->tel;
        $alu->pass = $request->pass;
        $alu->mat = $request->mat;
        $alu->carrera = $request->carrera;
        $alu->save();
        return redirect()->route('administrador.asesores', $admin->id)->with('success', 'Asesor Editado');
    }
    //eliminar
    public function eliminaras($id, $idas)
    {
        $admin = Administrador::find($id);
        $asesor = Asesores::find($idas);
        $asesor->delete();
        return redirect()->route('administrador.asesores', $admin->id);
    }

    //com
    public function comentarios($id)
    {
        $admin = Administrador::find($id);
        $comentarios = Comentarios::all();
        return view('administrador.comentarios', compact('comentarios', 'admin'));
    }
    public function eliminarcomen($id, $idcom)
    {
        $com = Comentarios::find($idcom);
        $com->delete();
        return redirect()->route('administrador.comentarios', $id);
    }
}
