<?php

namespace App\Http\Controllers;

use App\Models\profer;
use Illuminate\Http\Request;

class ProferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Lista
    public function listaProfer()
    {
        $datos['profer'] = profer::paginate(50); //el numero de filas

        return view('profer.listaProfer', $datos);
    }

    //Formulario
    public function formProfer()
    {
        return view('profer.crearProfer');
    }

    //Guardar
    public function saveProfer(Request $request)
    {
        $validator_l = $this->validate($request, [
            'nombre_profe'=>'required|string|max:45|unique:profers',
        ]);

        profer::create([
            'nombre_profe'=> $validator_l['nombre_profe'],
        ]);

        return redirect('/profer')->with('proferGuardado', "Nombre del Profesor Guardado");
    }

    //Formulario Editar
    public function editformProfer($id_profer)
    {
        $profer = profer::findOrFail($id_profer);

        return view('profer.editProfer', compact('profer'));
    }

    //Editar
    public function editProfer(Request $request, $id_profer)
    {
        $datoProfer = request()->except((['_token', '_method']));
        profer::where('id_profer', '=', $id_profer)->update($datoProfer);

        return redirect('/profer')->with('proferModificado', "Nombre del Profesor Modificado");
    }

    //Eliminar
    public function destroy($id_profer)
    {
        profer::destroy($id_profer);

        return redirect('/profer')->with('proferEliminado', "El nombre del profesor fue eliminado");
    }
}
