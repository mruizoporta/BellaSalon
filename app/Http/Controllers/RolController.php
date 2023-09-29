<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function __construct()
     {
         $this->middleware('auth');
     }
 
     public function create()
     { 
         return view('roles.create');
     }
 
   public function edit(Rol $rol){  
    
         return view('roles.edit', compact('rol'));
     }


    public function index()
    {
        $roles= Rol::all()
        ->where('activo',true);   

        return view('roles.index', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $rol = new Rol();
        $rol->nombre=$request->nombre; 

        if (is_null($request->roles)){$rol->roles=false;}
        else{$rol->roles=true;}   

        if (is_null($request->usuarios)){$rol->usuarios=false;}
        else{$rol->usuarios=true;}   

        if (is_null($request->empresas)){$rol->empresas=false;}
        else{$rol->empresas=true;}   

        if (is_null($request->parametros)){$rol->parametros=false;}
        else{$rol->parametros=true;}  
        
        if (is_null($request->sucursales)){$rol->sucursales=false;}
        else{$rol->sucursales=true;}  

        if (is_null($request->cargos)){$rol->cargos=false;}
        else{$rol->cargos=true;}  

        if (is_null($request->marcas)){$rol->marcas=false;}
        else{$rol->marcas=true;}  

        if (is_null($request->categorias)){$rol->categorias=false;}
        else{$rol->categorias=true;}  

        if (is_null($request->tiposalidas)){$rol->tiposalidas=false;}
        else{$rol->tiposalidas=true;}  

        if (is_null($request->tipoentradas)){$rol->tipoentradas=false;}
        else{$rol->tipoentradas=true;}

        if (is_null($request->almacenes)){$rol->almacenes=false;}
        else{$rol->almacenes=true;}

        if (is_null($request->productos)){$rol->productos=false;}
        else{$rol->productos=true;}

        if (is_null($request->servicios)){$rol->servicios=false;}
        else{$rol->servicios=true;}

        if (is_null($request->proveedores)){$rol->proveedores=false;}
        else{$rol->proveedores=true;}

        if (is_null($request->entradas)){$rol->entradas=false;}
        else{$rol->entradas=true;}

        if (is_null($request->salidas)){$rol->salidas=false;}
        else{$rol->salidas=true;}

        if (is_null($request->existencia)){$rol->existencia=false;}
        else{$rol->existencia=true;}

        if (is_null($request->kardex)){$rol->kardex=false;}
        else{$rol->kardex=true;}

        if (is_null($request->horarios)){$rol->horarios=false;}
        else{$rol->horarios=true;}

        if (is_null($request->asignarcitas)){$rol->asignarcitas=false;}
        else{$rol->asignarcitas=true;}

        if (is_null($request->configuracioncajas)){$rol->configuracioncajas=false;}
        else{$rol->configuracioncajas=true;}

        if (is_null($request->recibos)){$rol->recibos=false;}
        else{$rol->recibos=true;}

        if (is_null($request->depositos)){$rol->depositos=false;}
        else{$rol->depositos=true;}

        if (is_null($request->arqueocaja)){$rol->arqueocaja=false;}
        else{$rol->arqueocaja=true;}

        if (is_null($request->devoluciones)){$rol->devoluciones=false;}
        else{$rol->devoluciones=true;}

        if (is_null($request->facturascompras)){$rol->facturascompras=false;}
        else{$rol->facturascompras=true;}

        if (is_null($request->ncproveedores)){$rol->ncproveedores=false;}
        else{$rol->ncproveedores=true;}

        if (is_null($request->ecproveedores)){$rol->ecproveedores=false;}
        else{$rol->ecproveedores=true;}

        if (is_null($request->clientes)){$rol->clientes=false;}
        else{$rol->clientes=true;}

        if (is_null($request->notascredito)){$rol->notascredito=false;}
        else{$rol->notascredito=true;}

        if (is_null($request->notasdebito)){$rol->notasdebito=false;}
        else{$rol->notasdebito=true;}

        if (is_null($request->estadocuenta)){$rol->estadocuenta=false;}
        else{$rol->estadocuenta=true;}

        if (is_null($request->balancegeneral)){$rol->balancegeneral=false;}
        else{$rol->balancegeneral=true;}

        if (is_null($request->estadoresultado)){$rol->estadoresultado=false;}
        else{$rol->estadoresultado=true;}

        if (is_null($request->comprobantes)){$rol->comprobantes=false;}
        else{$rol->comprobantes=true;}

        if (is_null($request->cuentascontables)){$rol->cuentascontables=false;}
        else{$rol->cuentascontables=true;}

        if (is_null($request->comprobantes)){$rol->comprobantes=false;}
        else{$rol->comprobantes=true;}

        if (is_null($request->parametroscontables)){$rol->parametroscontables=false;}
        else{$rol->parametroscontables=true;}

        if (is_null($request->empleados)){$rol->empleados=false;}
        else{$rol->empleados=true;}

        if (is_null($request->vacaciones)){$rol->vacaciones=false;}
        else{$rol->vacaciones=true;}

        if (is_null($request->comisiones)){$rol->comisiones=false;}
        else{$rol->comisiones=true;}

        if (is_null($request->nomina)){$rol->nomina=false;}
        else{$rol->nomina=true;}
     
        $rol->save();
        $notification='El rol ha sido creada correctamente.';
        //return $request;
        return redirect('/roles')->with(compact('notification'));  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        return $rol;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rol $rol)
    {
        $rol->nombre=$request->nombre;   
        if (is_null($request->roles)){$rol->roles=false;}
        else{$rol->roles=true;}   

        if (is_null($request->usuarios)){$rol->usuarios=false;}
        else{$rol->usuarios=true;}   

        if (is_null($request->empresas)){$rol->empresas=false;}
        else{$rol->empresas=true;}   

        if (is_null($request->parametros)){$rol->parametros=false;}
        else{$rol->parametros=true;}  
        
        if (is_null($request->sucursales)){$rol->sucursales=false;}
        else{$rol->sucursales=true;}  

        if (is_null($request->cargos)){$rol->cargos=false;}
        else{$rol->cargos=true;}  

        if (is_null($request->marcas)){$rol->marcas=false;}
        else{$rol->marcas=true;}  

        if (is_null($request->categorias)){$rol->categorias=false;}
        else{$rol->categorias=true;}  

        if (is_null($request->tiposalidas)){$rol->tiposalidas=false;}
        else{$rol->tiposalidas=true;}  

        if (is_null($request->tipoentradas)){$rol->tipoentradas=false;}
        else{$rol->tipoentradas=true;}

        if (is_null($request->almacenes)){$rol->almacenes=false;}
        else{$rol->almacenes=true;}

        if (is_null($request->productos)){$rol->productos=false;}
        else{$rol->productos=true;}

        if (is_null($request->servicios)){$rol->servicios=false;}
        else{$rol->servicios=true;}

        if (is_null($request->proveedores)){$rol->proveedores=false;}
        else{$rol->proveedores=true;}

        if (is_null($request->entradas)){$rol->entradas=false;}
        else{$rol->entradas=true;}

        if (is_null($request->salidas)){$rol->salidas=false;}
        else{$rol->salidas=true;}

        if (is_null($request->existencia)){$rol->existencia=false;}
        else{$rol->existencia=true;}

        if (is_null($request->kardex)){$rol->kardex=false;}
        else{$rol->kardex=true;}

        if (is_null($request->horarios)){$rol->horarios=false;}
        else{$rol->horarios=true;}

        if (is_null($request->asignarcitas)){$rol->asignarcitas=false;}
        else{$rol->asignarcitas=true;}

        if (is_null($request->configuracioncajas)){$rol->configuracioncajas=false;}
        else{$rol->configuracioncajas=true;}

        if (is_null($request->recibos)){$rol->recibos=false;}
        else{$rol->recibos=true;}

        if (is_null($request->depositos)){$rol->depositos=false;}
        else{$rol->depositos=true;}

        if (is_null($request->arqueocaja)){$rol->arqueocaja=false;}
        else{$rol->arqueocaja=true;}

        if (is_null($request->devoluciones)){$rol->devoluciones=false;}
        else{$rol->devoluciones=true;}

        if (is_null($request->facturascompras)){$rol->facturascompras=false;}
        else{$rol->facturascompras=true;}

        if (is_null($request->ncproveedores)){$rol->ncproveedores=false;}
        else{$rol->ncproveedores=true;}

        if (is_null($request->ecproveedores)){$rol->ecproveedores=false;}
        else{$rol->ecproveedores=true;}

        if (is_null($request->clientes)){$rol->clientes=false;}
        else{$rol->clientes=true;}

        if (is_null($request->notascredito)){$rol->notascredito=false;}
        else{$rol->notascredito=true;}

        if (is_null($request->notasdebito)){$rol->notasdebito=false;}
        else{$rol->notasdebito=true;}

        if (is_null($request->estadocuenta)){$rol->estadocuenta=false;}
        else{$rol->estadocuenta=true;}

        if (is_null($request->balancegeneral)){$rol->balancegeneral=false;}
        else{$rol->balancegeneral=true;}

        if (is_null($request->estadoresultado)){$rol->estadoresultado=false;}
        else{$rol->estadoresultado=true;}

        if (is_null($request->comprobantes)){$rol->comprobantes=false;}
        else{$rol->comprobantes=true;}

        if (is_null($request->cuentascontables)){$rol->cuentascontables=false;}
        else{$rol->cuentascontables=true;}

        if (is_null($request->balanzacomprobacion)){$rol->balanzacomprobacion=false;}
        else{$rol->balanzacomprobacion=true;}

        if (is_null($request->parametroscontables)){$rol->parametroscontables=false;}
        else{$rol->parametroscontables=true;}

        if (is_null($request->empleados)){$rol->empleados=false;}
        else{$rol->empleados=true;}

        if (is_null($request->vacaciones)){$rol->vacaciones=false;}
        else{$rol->vacaciones=true;}

        if (is_null($request->comisiones)){$rol->comisiones=false;}
        else{$rol->comisiones=true;}

        if (is_null($request->nomina)){$rol->nomina=false;}
        else{$rol->nomina=true;} 
        $rol->save();
        $notification='El rol ha sido actualizada correctamente.';      
        return redirect('/roles')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
        $rol->activo=false;     
        $rol->save();
        $notification='El rol ha sido inactivada correctamente.';      
        return redirect('/roles')->with(compact('notification'));
    }
}
