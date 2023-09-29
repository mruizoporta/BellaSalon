<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Persona;
use App\Models\Producto;
use App\Models\ServiciosEmpleado;
use App\Models\vw_cargos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmpleadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $cargos = vw_cargos::all();

        $productos = Producto::all()
        ->where('activo',true)
        ->where('servicio',true);

        return view('empleados.create', compact('cargos','productos'));
    }

  public function edit(Empleado $empleado){   

        $cargos = vw_cargos::all();      

        $productos = Producto::all()
        ->where('activo',true)
        ->where('servicio',true);

        $servicios= ServiciosEmpleado::with('Producto')->get()
        ->where('empleado_id',$empleado->id);

        return view('empleados.edit', compact('empleado','cargos','servicios','productos'));
    }

    public function index()
    {
        $empleados= Empleado::with('Persona')->get()
        ->where('activo',true); 

      //  return   $empleados;
        return view('empleados.index', compact('empleados'));      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  return  $request;
        try{
            DB::beginTransaction();
    
            $persona = new Persona();
            $persona->empresa_id=1; 
            $persona->nombres=$request->nombres; 
            $persona->apellidos=$request->apellidos; 
            $persona->identificacion=$request->identificacion; 
            $persona->direccion=$request->direccion; 
            $persona->activo=true; 
            $persona->razonsocial=""; 
            $persona->telefono=$request->telefono; 
            $persona->correo=$request->correo;    
            $persona->save();
    
            $empleado = new Empleado();
            $empleado->empresa_id=1;  
            $empleado->activo=true; 
            $empleado->persona_id=$persona->id; 
            $empleado->fechaingreso=(new Carbon($request->fechaingreso))->format('Y-m-d');                
            $empleado->cargo_id=$request->cargo_id; 
            $empleado->save();
    
            //Insertamos los productos nuevos
            $producto_id=$request->get('producto_id');       
            
            $cont=0;

            while ($cont < count($producto_id)){
                $detalle = new ServiciosEmpleado();
                $detalle-> empleado_id=$empleado->id;
                $detalle-> producto_id=$producto_id[$cont]; 
                $detalle-> save();
                $cont = $cont +1;
            }           


            DB::commit();   
            }  
            catch(Exception $e){
                DB::rollback();
            }
            $notification='El empleado ha sido creado correctamente.';
            return redirect('/empleados')->with(compact('notification')); 
    }    
     
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return $empleado;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
    try
        {
        DB::beginTransaction();
        $persona = Persona::findOrFail($empleado->persona_id);
        $persona->empresa_id=1; 
        $persona->nombres=$request->nombres; 
        $persona->apellidos=$request->apellidos; 
        $persona->identificacion=$request->identificacion; 
        $persona->direccion=$request->direccion; 
        $persona->esjuridico=false; 
        $persona->razonsocial=""; 
        $persona->telefono=$request->telefono; 
        $persona->correo=$request->correo;  

        $empleado->empresa_id=1;         
        $empleado->persona_id=$persona->id; 
        $empleado->fechaingreso=(new Carbon($request->fechaingreso))->format('Y-m-d');                
        $empleado->cargo_id=$request->cargo_id;      
        $empleado->save();

          //Eliminamos los productos  
          DB::table('servicios_empleados')->where('empleado_id', '=', $empleado->id)->delete();
              
          //Insertamos los productos nuevos
         $producto_id=$request->get('producto_id');       
         
         $cont=0;

         while ($cont < count($producto_id)){
             $detalle = new ServiciosEmpleado();
             $detalle-> empleado_id=$empleado->id;
             $detalle-> producto_id=$producto_id[$cont]; 
             $detalle-> save();
             $cont = $cont +1;
         }           


         DB::commit();  
        
        }  
        catch(Exception $e){
            DB::rollback();
        }
        $notification='El empleado ha sido actualizada correctamente.';      
        return redirect('/empleados')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->activo=false;   
        $empleado->save();
        return $empleado;
    }
}
