<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Asesores;
use App\Models\Comentarios;
use App\Models\Reportes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class AsesoresController extends Controller
{

    public function pdf($id)
    {
        $alu = Asesores::find($id);
        $rep = Reportes::where('no_cont', $alu->no_cont)->get();
        $path = base_path('public/storage/fotop/itsch.jpg');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $im = 'data:image/' . $type . ";base64," . base64_encode($data);
        $pdf = PDF::setOptions(['defaultFont' => 'sans-serif'])->loadView('asesores.pdf', compact('im', 'alu', 'rep'));
        //return $pdf->download($alu->no_cont . ".pdf");
        return $pdf->stream($alu->no_cont . ".pdf");
    }

    public function index()
    {
    }
    public function perfil($no_cont)
    {
        $no_cont =  Crypt::decrypt($no_cont);
        $alu = Asesores::where('no_cont', $no_cont)->first();
        $ur = '.' . $alu->foto;
        if (!file_exists($ur)) {
            $alu->foto = "/storage/fotop/perfil.jpg";
            $alu->save();
        }
        return view('asesores.index', compact('alu'));
    }

    public function edit($id)
    {
        $id =  Crypt::decrypt($id);
        $alu = Asesores::find($id);
        return view('asesores.edperfil', compact('alu'));
    }
    public function update(Request $request, $id)
    {
        $alu = Asesores::find($id);
        $alu->tel = $request->tel;
        $alu->correo = $request->email;
        $alu->met = $request->meet;
        $alu->save();
        return redirect()->route('asesores.perfil', Crypt::encrypt($alu->no_cont));
    }
    //parte de foto
    public function foto($id)
    {
        $id =  Crypt::decrypt($id);
        $alu = Asesores::find($id);
        return view('asesores.foto', compact('alu'));
    }
    public function updatefoto(Request $request, $id)
    {
        $alu = Asesores::find($id);
        $request->validate([
            'file' => 'required'
        ]);
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
            return redirect()->route('asesores.perfil', Crypt::encrypt($alu->no_cont))
                ->with('success', 'La imagen se subió correctamente');
        } else {
            return redirect()->route('asesores.foto', Crypt::encrypt($alu->id))
                ->with('error', 'La extensión no es válida selecciona un archivo jpg, png, jpeg');
        }
    }
    //reportes
    public function reportes($id)
    {
        $alu = Asesores::find($id);
        $rep = Reportes::where('no_cont', $alu->no_cont)->get();
        return view('asesores.reportes', compact('rep', 'alu'));
    }
    //crear
    public function crearre($id)
    {
        $alu = Asesores::find($id);
        return view('asesores.crearre', compact('alu'));
    }
    public function guardarre(Request $request, $id)
    {
        $alu = Asesores::find($id);

        $rep = new Reportes();
        $rep->nombre = $request->nombre;
        $rep->no_cont = $alu->no_cont;
        $rep->materia = $request->materia;
        $rep->tema = $request->tema;
        $rep->no_cont2 = $request->no_cont;
        $rep->fecha = $request->fecha;
        $rep->save();
        return redirect()->route('asesores.reportes', $alu->id)->with('success', 'Registro Agregado');
    }
    //editar
    public function editarre($id, $idas)
    {
        $alu = Asesores::find($id);
        $re = Reportes::find($idas);
        return view('asesores.editarre', compact('alu', 're'));
    }
    public function updatere(Request $request, $id, $idas)
    {
        $alu = Asesores::find($id);
        $rep = Reportes::find($idas);
        $rep->nombre = $request->nombre;
        $rep->no_cont = $alu->no_cont;
        $rep->materia = $request->materia;
        $rep->tema = $request->tema;
        $rep->no_cont2 = $request->no_cont;
        $rep->fecha = $request->fecha;
        $rep->save();
        return redirect()->route('asesores.reportes', $alu->id)->with('success', 'Registro Editado');
    }
    //eliminar
    public function eliminarre($id, $idas)
    {
        $alu = Asesores::find($id);
        $rep = Reportes::find($idas);
        $rep->delete();
        return redirect()->route('asesores.reportes', $alu->id);
    }

    //com
    public function comentarios($id)
    {
        $alu = Asesores::find($id);
        $comentarios = Comentarios::where('no_cont_asesor', $alu->no_cont)->get();
        return view('asesores.comentarios', compact('comentarios', 'alu'));
    }
}
