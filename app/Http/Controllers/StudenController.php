<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\profer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudenController extends Controller
{

    //Lista
    public function lista(){

        $studen = DB::table('estudiante')
            ->join('profers','estudiante.id_profer', '=', 'profers.id_profer')
            ->select('estudiante.*', 'profers.nombre_profe')
            ->paginate(10);//el numero de filas

        return view('Estudiante.listaStuden', compact('studen'));

    }


    //Formulario
    public function form(){

        $profer = profer::all(); //para visualizar en formulario el profesor

        return view('Estudiante.crearStuden', compact('profer'));

    }

    //Guardar
    public function save(Request $request){

        $datostuden = request()->except('_token');

        $validator = $this->validate($request, [
            'nombre'=> 'required|string|max:255',
            'correo'=>'required|string|max:255',
            'grado'=>'required|max:20|string',
            'foto'=>'required',
            'id_profer'=> 'required'
        ]);

        //Guardar la foto
        if($request->hasFile('foto')){
            $datostuden['foto']=$request->file("foto")->store('uploads', 'public');
        }

        Estudiante::create([
            'nombre' => $validator['nombre'],
            'correo' => $validator['correo'],
            'grado' => $validator['grado'],
            'foto' => $datostuden['foto'],
            'id_profer' => $validator['id_profer'],

        ]);

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

        //se agrego el nombre del profesorr
        $profer= profer::all();

        $studen= Estudiante::findOrFail($id);

        return view('Estudiante.editStuden', compact('studen', 'profer'));
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

        return redirect('/')->with('studenModificado', 'Estudiante Modificado');
    }
}
