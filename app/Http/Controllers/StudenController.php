<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class StudenController extends Controller
{

    //Formulario
    public function form(){

        return view('Estudiante.crearStuden');

    }

    //Guardar
    public function save(Request $request){

        $validator = $this->validate($request, [
            'nombre'=> 'required|string|max:255',
            'correo'=>'required|string|max:255',
            'grado'=>'required|max:20|string',
            'foto'=>'required:estudiante'
        ]);

        $datostuden = request()->except('_token');
        Estudiante::insert($datostuden);

        //Para la foto
        if($request->hasFile('foto')){
            $datostuden['foto']=$request->file("foto")->store('uploads', 'public');
        }

        return back()->with('studenGuardado', 'Estudiante Guardado');

    }
}
