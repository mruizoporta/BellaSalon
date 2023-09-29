<?php

namespace App\Http\Controllers;

use App\Models\EntradaDetalle;
use Illuminate\Http\Request;

class EntradaDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EntradaDetalle::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entradadetalle = new EntradaDetalle();
        $entradadetalle->entrada_id=$request->entrada_id;  
        $entradadetalle->producto_id=$request->producto_id;     
        $entradadetalle->almacen_id=$request->almacen_id;
        $entradadetalle->cantidad=$request->cantidad; 
        $entradadetalle->existenciaanterior=$request->existenciaanterior; 
        $entradadetalle->costo=$request->costo; 
        $entradadetalle->save();
        return $entradadetalle;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EntradaDetalle  $entradaDetalle
     * @return \Illuminate\Http\Response
     */
    public function show(EntradaDetalle $entradaDetalle)
    {
        return $entradaDetalle;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EntradaDetalle  $entradaDetalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EntradaDetalle $entradaDetalle)
    {
        $entradaDetalle->entrada_id=$request->entrada_id;  
        $entradaDetalle->producto_id=$request->producto_id;     
        $entradaDetalle->almacen_id=$request->almacen_id;
        $entradaDetalle->cantidad=$request->cantidad; 
        $entradaDetalle->existenciaanterior=$request->existenciaanterior; 
        $entradaDetalle->costo=$request->costo; 
        $entradaDetalle->save();
        return $entradaDetalle;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EntradaDetalle  $entradaDetalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(EntradaDetalle $entradaDetalle)
    {
        $res=$entradaDetalle->delete();
        return $res;
    }
}
