<?php

namespace App\Http\Controllers;

use App\Models\profer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\log;

class ProferController extends Controller
{
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
        try {
            $validator_l = $this->validate($request, [
                'nombre_profe'=>'required|string|max:45|unique:profers',
            ]);

            //es "nombre"
            profer::create([
                'nombre_profe'=> $validator_l['nombre_profe'],
            ]);
        }catch (\Exception $exception){

            Log::debug($exception->getMessage());

            return redirect('/formProfer')->with('alerta', 'ok');
        }

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
        try{
            profer::destroy($id_profer);

            return redirect('/profer')->with('proferEliminado', "Eliminado el profesor");

        }catch (\Exception $exception){

            Log::debug($exception->getMessage());

            return redirect('/profer')->with('alerta', 'ok');
        }
    }
}
