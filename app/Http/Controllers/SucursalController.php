<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Empresa;
use App\Models\Pais;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $paises = Pais::all();
        $ciudades = Ciudad::all();
        $empresas = Empresa::all()
        ->where('activo',true); ;
        return view('sucursales.create', compact('paises','ciudades','empresas'));
    }

  public function edit(Sucursal $sucursal){  
        $paises = Pais::all();
        $ciudades = Ciudad::all();
        $empresas = Empresa::all()
        ->where('activo',true); ;
        return view('sucursales.edit', compact('sucursal','empresas','paises','ciudades'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursales= Sucursal::with('pais','empresa','ciudad')->get()
        ->where('activo',true);   

        return view('sucursales.index', compact('sucursales'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sucursal = new Sucursal();
        $sucursal->empresa_id=1;//$request->empresa_id;  
        $sucursal->nombre=$request->nombre;     
        $sucursal->ruc=$request->ruc;
        $sucursal->direccion=$request->direccion; 
        $sucursal->telefono=$request->telefono; 
        $sucursal->web=$request->web; 
        $sucursal->correo=$request->correo; 
        $sucursal->logo=$request->logo; 
        $sucursal->pais_id=$request->pais_id; 
        $sucursal->ciudad_id=$request->ciudad_id; 
        $sucursal->save();
       
        $notification='La sucursal ha sido creada correctamente.';
        return redirect('/sucursales')->with(compact('notification'));   
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal)
    {
        return $sucursal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sucursal $sucursal)
    {
        $sucursal->empresa_id=1;//$request->empresa_id;  
        $sucursal->nombre=$request->nombre;     
        $sucursal->ruc=$request->ruc;
        $sucursal->direccion=$request->direccion; 
        $sucursal->telefono=$request->telefono; 
        $sucursal->web=$request->web; 
        $sucursal->correo=$request->correo; 
        $sucursal->logo=$request->logo; 
        $sucursal->pais_id=$request->pais_id; 
        $sucursal->ciudad_id=$request->ciudad_id; 
        $sucursal->save();
        $notification='La sucursal ha sido actualizada correctamente.';      
        return redirect('/sucursales')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sucursal $sucursal)
    {
        $sucursal->activo=false;   
        $sucursal->save();
        $notification='La sucursal ha sido inactivada correctamente.';      
        return redirect('/sucursales')->with(compact('notification'));
    }
}
