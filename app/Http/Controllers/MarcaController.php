<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
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
         return view('marcas.create');
     }
 
   public function edit(Marca $marca){  
    
         return view('marcas.edit', compact('marca'));
     }

    public function index()
    {
        $marcas= Marca::all()
        ->where('activo',true);   

        return view('marcas.index', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Marca = new Marca();
        $Marca->nombre=$request->nombre;     
        $Marca->save();

        $notification='La marca ha sido creada correctamente.';
        return redirect('/marcas')->with(compact('notification'));  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        return $marca;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        $marca->nombre=$request->nombre;     
        $marca->save();
        $notification='La marca ha sido actualizada correctamente.';      
        return redirect('/marcas')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        $marca->activo=false;     
        $marca->save();
        $notification='La marca ha sido inactivada correctamente.';      
        return redirect('/marcas')->with(compact('notification'));
    }
}
