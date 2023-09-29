<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Persona::where('activo',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Persona();
        $persona->empresa_id=$request->empresa_id; 
        $persona->nombres=$request->nombres; 
        $persona->apellidos=$request->apellidos; 
        $persona->identificacion=$request->identificacion; 
        $persona->direccion=$request->direccion; 
        $persona->esjuridico=$request->esjuridico; 
        $persona->razonsocial=$request->razonsocial; 
        $persona->telefono=$request->telefono; 
        $persona->correo=$request->correo;    
        $persona->save();
        return $persona;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        return $persona;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $persona->empresa_id=$request->empresa_id; 
        $persona->nombres=$request->nombres; 
        $persona->apellidos=$request->apellidos; 
        $persona->identificacion=$request->identificacion; 
        $persona->direccion=$request->direccion; 
        $persona->esjuridico=$request->esjuridico; 
        $persona->razonsocial=$request->razonsocial; 
        $persona->telefono=$request->telefono; 
        $persona->correo=$request->correo;    
        $persona->save();
        return $persona;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $persona->activo=false;     
        $persona->save();
        return $persona;
    }
}
