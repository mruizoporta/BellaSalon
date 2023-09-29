<?php

namespace App\Http\Controllers;

use App\Models\TipoPersona;
use Illuminate\Http\Request;

class TipoPersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ["categorias"];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoPersona = new TipoPersona();      
        $tipoPersona->nombre=$request->nombre;     
        $tipoPersona->save();
        return $tipoPersona;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function show(TipoPersona $tipoPersona)
    {
        return $tipoPersona;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoPersona $tipoPersona)
    {
        $tipoPersona->nombre=$request->nombre;     
        $tipoPersona->save();
        return $tipoPersona;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoPersona $tipoPersona)
    {
        $tipoPersona->activo=false;   
        $tipoPersona->save();
        return $tipoPersona;
    }
}
