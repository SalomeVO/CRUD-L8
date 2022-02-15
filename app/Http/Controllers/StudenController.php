<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class StudenController extends Controller
{

    //Lista
    public function lista(){
        $datos['studen'] = Estudiante::paginate(3);

        return view('Estudiante.listaStuden', $datos);
    }


    //Formulario
    public function form(){

        return view('Estudiante.crearStuden');

    }

    //Guardar
    public function save(Request $request){

        $datostuden = request()->except('_token');

        $validator = $this->validate($request, [
            'nombre'=> 'required|string|max:255',
            'correo'=>'required|string|max:255',
            'grado'=>'required|max:20|string',
            'foto'=>'required:estudiante'
        ]);

        //Para la foto
        if($request->hasFile('foto')){
            $datostuden['foto']=$request->file("foto")->store('uploads', 'public');
        }

        Estudiante::insert($datostuden);

        return back()->with('studenGuardado', 'Estudiante Guardado');

    }
}
