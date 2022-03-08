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
    public function listaProfer()
    {
        $datos['profers'] = profer::paginate(50); //el numero de filas

        return view('profer.listaProfer', $datos);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(profer $profer)
    {
        //
    }


    public function edit(profer $profer)
    {
        //
    }


    public function update(Request $request, profer $profer)
    {
        //
    }

    public function destroy(profer $profer)
    {
        //
    }
}
