<?php

namespace App\Http\Controllers;

use App\Models\SalidaDetalle;
use Illuminate\Http\Request;

class SalidaDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SalidaDetalle::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salidaDetalle = new SalidaDetalle();
        $salidaDetalle->salida_id=$request->salida_id;  
        $salidaDetalle->producto_id=$request->producto_id;     
        $salidaDetalle->almacen_id=$request->almacen_id;
        $salidaDetalle->cantidad=$request->cantidad; 
        $salidaDetalle->existenciaanterior=$request->existenciaanterior; 
        $salidaDetalle->costo=$request->costo; 
        $salidaDetalle->save();
        return $salidaDetalle;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalidaDetalle  $salidaDetalle
     * @return \Illuminate\Http\Response
     */
    public function show(SalidaDetalle $salidaDetalle)
    {
        return $salidaDetalle;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalidaDetalle  $salidaDetalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalidaDetalle $salidaDetalle)
    {
        $salidaDetalle->salida_id=$request->salida_id;  
        $salidaDetalle->producto_id=$request->producto_id;     
        $salidaDetalle->almacen_id=$request->almacen_id;
        $salidaDetalle->cantidad=$request->cantidad; 
        $salidaDetalle->existenciaanterior=$request->existenciaanterior; 
        $salidaDetalle->costo=$request->costo; 
        $salidaDetalle->save();
        return $salidaDetalle;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalidaDetalle  $salidaDetalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalidaDetalle $salidaDetalle)
    {
        $res=$salidaDetalle->delete();
        return $res;
    }
}
