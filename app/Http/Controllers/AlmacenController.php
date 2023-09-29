<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\Empresa;
use App\Models\Pais;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $empresas = Empresa::all()
        ->where('activo',true);   ;

        return view('almacenes.create', compact('empresas'));
    }

  public function edit(Almacen $almacen){  
        $empresas = Empresa::all()
         ->where('activo',true);   ;    
        return view('almacenes.edit', compact('almacen','empresas'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacenes= Almacen::with('Empresa')->get()
        ->where('activo',true);   

        return view('almacenes.index', compact('almacenes'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Almacen = new Almacen();
        $Almacen->nombre=$request->nombre;  
        $Almacen->empresa_id=$request->empresa_id;     
        $Almacen->save();
       
        $notification='El almacen ha sido creada correctamente.';
        return redirect('/almacenes')->with(compact('notification'));   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function show(Almacen $almacen)
    {
        return $almacen;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Almacen $almacen)
    {
        $almacen->nombre=$request->nombre;  
        $almacen->empresa_id=$request->empresa_id;     
        $almacen->save();
        $notification='El almacen ha sido actualizada correctamente.';      
        return redirect('/almacenes')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Almacen $almacen)
    {
        $almacen->activo=false;          
        $almacen->save();
        $notification='El almacen ha sido inactivada correctamente.';      
        return redirect('/almacenes')->with(compact('notification'));
    }
}
