<?php

namespace App\Http\Controllers;

use App\Models\Medida;
use Illuminate\Http\Request;

class MedidaController extends Controller
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
        return view('medidas.create');
    }

  public function edit(Medida $medida){  
        return view('medidas.edit', compact('medida'));
    }

    public function index()
    {
        $medidas= Medida::all()
        ->where('activo',true);   

        return view('medidas.index', compact('medidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Medida = new Medida();
        $Medida->nombre=$request->nombre;   
        $Medida->codigo=$request->codigo;    
        $Medida->save();
        $notification='La unidad de medida ha sido creada correctamente.';
        return redirect('/medidas')->with(compact('notification'));   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function show(Medida $medida)
    {        
        return $medida;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medida $medida)
    {
        $medida->nombre=$request->nombre;   
        $medida->codigo=$request->codigo;    
        $medida->save();
        $notification='La unidad de medida ha sido actualizada correctamente.';      
        return redirect('/medidas')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medida $medida)
    {
        $medida->activo=false;     
        $medida->save();
        $notification='La unidad de medida ha sido inactivada correctamente.';      
        return redirect('/medidas')->with(compact('notification'));
    }
}
