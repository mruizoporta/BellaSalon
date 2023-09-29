<?php

namespace App\Http\Controllers;

use App\Models\MovimientoInventario;
use Illuminate\Http\Request;

class MovimientoInventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MovimientoInventario::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movimientoInventario = new MovimientoInventario();
        $movimientoInventario->entrada_id=$request->entrada_id;  
        $movimientoInventario->salida_id=$request->salida_id;     
        $movimientoInventario->producto_id=$request->producto_id;
        $movimientoInventario->almacen_id=$request->almacen_id; 
        $movimientoInventario->cantidad=$request->cantidad; 
        $movimientoInventario->compra=$request->compra; 
        $movimientoInventario->venta=$request->venta; 
        $movimientoInventario->cantidad=$request->cantidad; 
        $movimientoInventario->save();
        return $movimientoInventario;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MovimientoInventario  $movimientoInventario
     * @return \Illuminate\Http\Response
     */
    public function show(MovimientoInventario $movimientoInventario)
    {
        return $movimientoInventario;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MovimientoInventario  $movimientoInventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovimientoInventario $movimientoInventario)
    {
        $movimientoInventario->entrada_id=$request->entrada_id;  
        $movimientoInventario->salida_id=$request->salida_id;     
        $movimientoInventario->producto_id=$request->producto_id;
        $movimientoInventario->almacen_id=$request->almacen_id; 
        $movimientoInventario->cantidad=$request->cantidad; 
        $movimientoInventario->compra=$request->compra; 
        $movimientoInventario->venta=$request->venta; 
        $movimientoInventario->cantidad=$request->cantidad; 
        $movimientoInventario->save();
        return $movimientoInventario;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MovimientoInventario  $movimientoInventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovimientoInventario $movimientoInventario)
    {
        $res=$movimientoInventario->delete();
        return $res;
    }
}
