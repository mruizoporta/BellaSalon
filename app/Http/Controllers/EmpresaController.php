<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Pais;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $paises = Pais::all();

        return view('empresas.create', compact('paises'));
    }

  public function edit(Empresa $empresa){  
        $paises = Pais::all();    
        return view('empresas.edit', compact('empresa','paises'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas= Empresa::with('pais')->get()
        ->where('activo',true);   

        return view('empresas.index', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa = new Empresa();     
        $empresa->nombre=$request->nombre;     
        $empresa->ruc=$request->ruc;
        $empresa->direccion=$request->direccion; 
        $empresa->telefono=$request->telefono; 
        $empresa->web=$request->web; 
        $empresa->correo=$request->correo; 
        $empresa->logo=$request->logo; 
        $empresa->pais_id=$request->pais_id; 
        $empresa->save();

        $notification='La empresa ha sido creada correctamente.';
        return redirect('/empresas')->with(compact('notification'));   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return $empresa;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {        
        $empresa->nombre=$request->nombre;     
        $empresa->ruc=$request->ruc;
        $empresa->direccion=$request->direccion; 
        $empresa->telefono=$request->telefono; 
        $empresa->web=$request->web; 
        $empresa->correo=$request->correo; 
        $empresa->logo=$request->logo; 
        $empresa->pais_id=$request->pais_id; 
        $empresa->save();

        $notification='La empresa ha sido actualizada correctamente.';      
        return redirect('/empresas')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->activo=false;   
        $empresa->save();

        $notification='La empresa ha sido inactivada correctamente.';      
        return redirect('/empresas')->with(compact('notification'));
    }
}
