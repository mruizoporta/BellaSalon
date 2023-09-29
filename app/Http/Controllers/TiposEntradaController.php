<?php

namespace App\Http\Controllers;

use App\Models\TiposEntrada;
use Illuminate\Http\Request;

class TiposEntradaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    { 
        return view('tiposentradas.create');
    }

  public function edit(TiposEntrada $tipoentrada){  
   
        return view('tiposentradas.edit', compact('tipoentrada'));
    }

   public function index()
   {
       $tiposentrada= TiposEntrada::all()
       ->where('activo',true);   

       return view('tiposentradas.index', compact('tiposentrada'));
   }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoentrada = new TiposEntrada();       
        $tipoentrada->nombre=$request->nombre;     
        $tipoentrada->save();
        $notification='El tipo de entrada ha sido creada correctamente.';
        return redirect('/tiposentradas')->with(compact('notification'));  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TiposEntrada  $tiposEntrada
     * @return \Illuminate\Http\Response
     */
    public function show(TiposEntrada $tiposEntrada)
    {
        return $tiposEntrada;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TiposEntrada  $tiposEntrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TiposEntrada $tipoentrada)
    {
        $tipoentrada->nombre=$request->nombre;     
        $tipoentrada->save();
        $notification='El tipo de entrada ha sido actualizada correctamente.';      
        return redirect('/tiposentradas')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TiposEntrada  $tiposEntrada
     * @return \Illuminate\Http\Response
     */
    public function destroy(TiposEntrada $tipoentrada)
    {
        $tipoentrada->activo=false;   
        $tipoentrada->save();
        $notification='El tipo de entrada ha sido inactivada correctamente.';      
        return redirect('/tiposentradas')->with(compact('notification'));
    }
}
