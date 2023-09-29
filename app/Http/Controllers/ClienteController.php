<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cliente::where('activo',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->empresa_id=$request->empresa_id;  
        $cliente->persona_id=$request->persona_id;     
        $cliente->contacto_id=$request->contacto_id;
        $cliente->limitecredito=$request->limitecredito; 
        $cliente->save();
        return $cliente;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return $cliente;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->empresa_id=$request->empresa_id;  
        $cliente->persona_id=$request->persona_id;     
        $cliente->contacto_id=$request->contacto_id;
        $cliente->limitecredito=$request->limitecredito; 
        $cliente->save();
        return $cliente;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->activo=false;   
        $cliente->save();
        return $cliente;
    }
}
