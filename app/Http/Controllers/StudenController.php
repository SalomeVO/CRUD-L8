<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudenController extends Controller
{

    //Lista
    public function lista(){
        $datos['studen'] = Estudiante::paginate(50); //el numero de filas

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

        //Guardar la foto
        if($request->hasFile('foto')){
            $datostuden['foto']=$request->file("foto")->store('uploads', 'public');
        }

        Estudiante::insert($datostuden);

        return redirect('/')->with('studenGuardado', 'Estudiante Guardado');

    }

    //Eliminar
    public function delete($id){

        $studen= Estudiante::findOrFail($id);

        //para eliminar foto
        if(Storage::delete('public/'.$studen->foto)){

            Estudiante::destroy($id); //eliminar los estudiantes
        }

        return redirect('/')->with('studenEliminado', 'Estudiante Eliminado');
    }

    //Formulario Guardar
    public function editform($id){

        $studen= Estudiante::findOrFail($id);

        return view('Estudiante.editStuden', compact('studen'));
    }

    //Editar
    public function edit(Request $request, $id){

        $datoStuden = request()->except((['_token', '_method']));

        //Editar foto
        if($request->hasFile('foto')){

            $studen= Estudiante::findOrFail($id);

            Storage::delete('public/'.$studen->foto);

            $datoStuden['foto']=$request->file("foto")->store('uploads', 'public');
        }

        Estudiante::where('id', '=', $id)->update($datoStuden);
        $studen= Estudiante::findOrFail($id);

        return redirect('/')->with('studenModificado', 'Estudiante Modificado', compact('studen'));
    }
}
