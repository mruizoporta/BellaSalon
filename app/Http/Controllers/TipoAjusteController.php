<?php

namespace App\Http\Controllers;

use App\Models\TipoAjuste;
use Illuminate\Http\Request;

class TipoAjusteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TipoAjuste::where('activo',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoAjuste = new TipoAjuste();     
        $tipoAjuste->codigo=$request->codigo;     
        $tipoAjuste->nombre=$request->nombre;     
        $tipoAjuste->save();
        return $tipoAjuste;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoAjuste  $tipoAjuste
     * @return \Illuminate\Http\Response
     */
    public function show(TipoAjuste $tipoAjuste)
    {
        return $tipoAjuste;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoAjuste  $tipoAjuste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoAjuste $tipoAjuste)
    {
        $tipoAjuste->codigo=$request->codigo;     
        $tipoAjuste->nombre=$request->nombre;     
        $tipoAjuste->save();
        return $tipoAjuste;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoAjuste  $tipoAjuste
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoAjuste $tipoAjuste)
    {
        $tipoAjuste->activo=false;   
        $tipoAjuste->save();
        return $tipoAjuste;
    }
}
