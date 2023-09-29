<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\Entrada;
use App\Models\EntradaDetalle;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Sucursal;
use App\Models\vw_proveedores;
use App\Models\vw_tiposentradas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EntradaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $tiposentrada = vw_tiposentradas::All();
        $proveedores = vw_proveedores::All();
        $almacenes = Almacen::All();
        $productos = Producto::all()
        ->where('activo',true);   
        $sucursales = Sucursal::all()
        ->where('activo',true);   

        return view('entradas.create', compact('proveedores','tiposentrada','productos','proveedores','almacenes','sucursales'));
    }

  public function edit(Entrada $entrada){  
        $proveedores = Proveedor::all()
        ->where('activo',true);   

        $tiposentrada = vw_tiposentradas::all();

        return view('entradas.edit', compact('entrada','proveedores','tiposentrada'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entradas= Entrada::with('Proveedor')->get()
        ->where('activo',true);   

        return view('entradas.index', compact('entradas'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
       
        try{
            DB::beginTransaction();
                $entrada = new Entrada();
                $entrada->empresa_id=1;  
                $entrada->tipoentrada_id=$request->tipoentrada_id;  
                $entrada->sucursal_id=$request->sucursal_id;     
                $entrada->almacen_id=$request->almacen_id;
                $entrada->proveedor_id=$request->proveedor_id; 
                $entrada->numerofactura=$request->numerofactura; 
                $entrada->fechafactura=(new Carbon($request->fechaentrada))->format('Y-m-d');    
                $entrada->fechaentrada=(new Carbon($request->fechaentrada))->format('Y-m-d');                  
                $entrada->anulada=0; 
                $entrada->comentarioanular=""; 
                $entrada->total=$request->totalentrada; 
                $entrada->save();

                //Detalle de productos
                $producto_id=$request->get('producto_id');
                $cantidades=$request->get('cantidades');
            
                $cont=0;

                while ($cont < count($producto_id)){    
                    
                    $detalle = new EntradaDetalle();
                    $detalle-> entrada_id=$entrada->id;
                    $detalle-> producto_id=$producto_id[$cont];
                    $detalle-> cantidad=$cantidades[$cont];
                    $detalle-> cantidad=$request->almacen_id;
                    $detalle-> save();

                    $parametroalmacen = $request->almacen_id;                   
                    $parametroproducto=$producto_id[$cont]; 
                    $parametrocantidad =  $cantidades[$cont];
                    $datos = DB::select("call aumentarexistencia($parametroalmacen, $parametroproducto, $parametrocantidad)");          
                    $cont = $cont +1;
                }
        
            DB::commit();   
            }  
            catch(Exception $e){
                DB::rollback();
            }
            $notification='La entrada ha sido creado correctamente.';
            return redirect('/entradas')->with(compact('notification')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function show(Entrada $entrada)
    {
        return $entrada;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrada $entrada)
    {
        $entrada->empresa_id=$request->empresa_id;  
        $entrada->tipoentrada_id=$request->tipoentrada_id;     
        $entrada->almacen_id=$request->almacen_id;
        $entrada->proveedor_id=$request->proveedor_id; 
        $entrada->numerofactura=$request->numerofactura; 
        $entrada->fechafactura=$request->fechafactura; 
        $entrada->fechaentrada=$request->fechaentrada; 
        $entrada->anulada=$request->anulada; 
        $entrada->comentarioanular=$request->comentarioanular; 
        $entrada->total=$request->totalentrada; 
        $entrada->save();
        return $entrada;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrada $entrada)
    {
        $entrada->activo=false;   
        $entrada->save();
        return $entrada;
    }
}
