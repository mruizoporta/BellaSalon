<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
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
         return view('categorias.create');
     }
 
   public function edit(Categoria $categoria){  
    
         return view('categorias.edit', compact('categoria'));
     }


    public function index()
    {
        $categorias= Categoria::all()
        ->where('activo',true);   

        return view('categorias.index', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre=$request->nombre;      
        $categoria->save();

        $notification='La categoria ha sido creada correctamente.';
        return redirect('/categorias')->with(compact('notification'));  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return $categoria;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->nombre=$request->nombre;      
        $categoria->save();
        $notification='La categoria ha sido actualizada correctamente.';      
        return redirect('/categorias')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->activo=false;          
        $categoria->save();
        $notification='La categoria ha sido inactivada correctamente.';      
        return redirect('/categorias')->with(compact('notification'));
    }
}
