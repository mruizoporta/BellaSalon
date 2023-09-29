<?php

namespace App\Http\Controllers;

use App\Models\PersonaClasificacion;
use Illuminate\Http\Request;

class PersonaClasificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PersonaClasificacion::where('activo',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personaClasificacion = new PersonaClasificacion();
        $personaClasificacion->persona_id=$request->persona_id; 
        $personaClasificacion->tipopersona_id=$request->tipopersona_id;    
        $personaClasificacion->save();
        return $personaClasificacion;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PersonaClasificacion  $personaClasificacion
     * @return \Illuminate\Http\Response
     */
    public function show(PersonaClasificacion $personaClasificacion)
    {
        return $personaClasificacion;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PersonaClasificacion  $personaClasificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonaClasificacion $personaClasificacion)
    {
        $personaClasificacion->persona_id=$request->persona_id; 
        $personaClasificacion->tipopersona_id=$request->tipopersona_id;    
        $personaClasificacion->save();
        return $personaClasificacion;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PersonaClasificacion  $personaClasificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonaClasificacion $personaClasificacion)
    {
        $personaClasificacion->activo=false;     
        $personaClasificacion->save();
        return $personaClasificacion;
    }
}
