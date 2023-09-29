<?php

namespace App\Http\Controllers;

use App\Models\BodegaProducto;
use App\Models\Producto;
use Illuminate\Http\Request;

class BodegaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
         $bodegaproductos= BodegaProducto::with('Producto','Almacen')->get();       
 
         return view('existencias.index', compact('bodegaproductos'));
     }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bodegaproducto = new BodegaProducto();
        $bodegaproducto->producto_id=$request->producto_id;  
        $bodegaproducto->almacen_id=$request->almacen_id;  
        $bodegaproducto->existencia=$request->existencia;     
        $bodegaproducto->save();
        return $bodegaproducto;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BodegaProducto  $bodegaProducto
     * @return \Illuminate\Http\Response
     */
    public function show(BodegaProducto $bodegaProducto)
    {
        return $bodegaProducto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BodegaProducto  $bodegaProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BodegaProducto $bodegaProducto)
    {
        $bodegaProducto->producto_id=$request->producto_id;  
        $bodegaProducto->almacen_id=$request->almacen_id;  
        $bodegaProducto->existencia=$request->existencia;     
        $bodegaProducto->save();
        return $bodegaProducto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BodegaProducto  $bodegaProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(BodegaProducto $bodegaProducto)
    {
        $res=$bodegaProducto->delete();

        return $res;
    }
}
