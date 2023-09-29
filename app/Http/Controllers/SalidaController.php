<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Salida::where('activo',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salida = new Salida();
        $salida->empresa_id=$request->empresa_id;  
        $salida->tiposalida_id=$request->tiposalida_id;     
        $salida->almacen_id=$request->almacen_id;
        $salida->fechasalida=$request->fechasalida; 
        $salida->anulada=$request->anulada;       
        $salida->comentarioanular=$request->comentarioanular; 
        $salida->save();
        return $salida;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function show(Salida $salida)
    {
        return $salida;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salida $salida)
    {
        $salida->empresa_id=$request->empresa_id;  
        $salida->tiposalida_id=$request->tiposalida_id;     
        $salida->almacen_id=$request->almacen_id;
        $salida->fechasalida=$request->fechasalida; 
        $salida->anulada=$request->anulada;       
        $salida->comentarioanular=$request->comentarioanular; 
        $salida->save();
        return $salida;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salida $salida)
    {
        $salida->activo=false;   
        $salida->save();
        return $salida;
    }
}
