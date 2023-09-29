<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('proveedores.create');
    }

  public function edit(Proveedor $proveedor){            
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $proveedores= Proveedor::with('Persona')->get()
        ->where('activo',true); 

        return view('proveedores.index', compact('proveedores'));
    }

    public function store(Request $request)
    {
    try{
        DB::beginTransaction();

        $persona = new Persona();
        $persona->empresa_id=1; 
        $persona->nombres=""; 
        $persona->apellidos=""; 
        $persona->identificacion=$request->identificacion; 
        $persona->direccion=$request->direccion; 
        $persona->esjuridico=true; 
        $persona->razonsocial=$request->razonsocial; 
        $persona->telefono=$request->telefono; 
        $persona->correo=$request->correo;    
        $persona->save();

        $proveedor = new Proveedor();
        $proveedor->empresa_id=1; 
        $proveedor->persona_id=$persona->id; 
        $proveedor->nombrecontacto=$request->nombrecontacto; 
        $proveedor->correocontacto=$request->correocontacto;    
        $proveedor->telefonocontacto=$request->telefonocontacto;         
        $proveedor->save();

        DB::commit();   
        }  
        catch(Exception $e){
            DB::rollback();
        }
        $notification='El proveedor ha sido creado correctamente.';
        return redirect('/proveedores')->with(compact('notification')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        return $proveedor;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {    
        $persona = Persona::findOrFail($proveedor->persona_id);
        $persona->empresa_id=1; 
        $persona->nombres=""; 
        $persona->apellidos=""; 
        $persona->identificacion=$request->identificacion; 
        $persona->direccion=$request->direccion; 
        $persona->esjuridico=true; 
        $persona->razonsocial=$request->razonsocial; 
        $persona->telefono=$request->telefono; 
        $persona->correo=$request->correo;  

        $proveedor->nombrecontacto=$request->nombrecontacto; 
        $proveedor->correocontacto=$request->correocontacto;    
        $proveedor->telefonocontacto=$request->telefonocontacto;      
        
        $persona->save();
        $notification='El proveedor ha sido actualizado correctamente.';
        return redirect('/proveedores')->with(compact('notification')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->activo=false;     
        $proveedor->save();
        $notification='El proveedor ha sido inactivado correctamente.';
        return redirect('/proveedores')->with(compact('notification'));
    }
}
