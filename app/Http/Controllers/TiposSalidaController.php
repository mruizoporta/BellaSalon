<?php

namespace App\Http\Controllers;

use App\Models\TiposSalida;
use Illuminate\Http\Request;

class TiposSalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
     {
         $this->middleware('auth');
     }
 
     public function create()
     { 
         return view('tipossalida.create');
     }
 
   public function edit(TiposSalida $tiposalida){  
         return view('tipossalida.edit', compact('tiposalida'));
     }

    public function index()
    {
        $tipossalida= TiposSalida::all()
        ->where('activo',true);   

        return view('tipossalida.index', compact('tipossalida'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tiposalida = new TiposSalida();       
        $tiposalida->nombre=$request->nombre;     
        $tiposalida->save();
        $notification='El tipo de salida ha sido creada correctamente.';
        return redirect('/tipossalidas')->with(compact('notification'));  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TiposSalida  $tiposSalida
     * @return \Illuminate\Http\Response
     */
    public function show(TiposSalida $tiposSalida)
    {
        return $tiposSalida;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TiposSalida  $tiposSalida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TiposSalida $tiposalida)
    {
        $tiposalida->nombre=$request->nombre;     
        $tiposalida->save();
        $notification='El tipo de salida ha sido actualizada correctamente.';      
        return redirect('/tipossalidas')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TiposSalida  $tiposSalida
     * @return \Illuminate\Http\Response
     */
    public function destroy(TiposSalida $tiposalida)
    {
        $tiposalida->activo=false;   
        $tiposalida->save();
        $notification='El tipo de salida ha sido inactivada correctamente.';      
        return redirect('/tipossalidas')->with(compact('notification'));
    }
}
