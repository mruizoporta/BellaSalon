<?php

namespace App\Http\Controllers;

use App\Models\BodegaProducto;
use App\Models\producto_proveedore;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Medida;
use App\Models\Producto;
use App\Models\ServicioProducto;
use App\Models\vw_categorias;
use App\Models\vw_marcas;
use App\Models\vw_medidas;
use App\Models\vw_producto_proveedores;
use App\Models\ofertaproducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductoController extends Controller
{
   /*  public function __construct()
    {
        $this->middleware('auth');
    } */

    public function create()
    {
        $marcas = vw_marcas::all();
        $medidas = vw_medidas::all(); 
        $categorias = vw_categorias::all();  

        return view('productos.create', compact('marcas','medidas','categorias'));
    }

    public function createservicio()
    {       
       
        $medidas = vw_medidas::all(); 
        $categorias = vw_categorias::all();  

        $productos = Producto::all()
        ->where('activo',true)
        ->where('servicio',false);

        return view('servicios.create', compact('productos','medidas','categorias'));
    }

  public function edit(Producto $producto){  

        $marcas = vw_marcas::all();
        $medidas = vw_medidas::all(); 
        $categorias = vw_categorias::all();  

        $productoproveedores = vw_producto_proveedores :: all()//:: with('Producto')->get()
        ->where('producto_id',$producto->id);

        $bodegaproductos= BodegaProducto::with('Almacen')->get()
        ->where('producto_id',$producto->id);

        $productoofertas= ofertaproducto::All()
        ->where('producto_id',$producto->id)
        ->where('activo',true);         
      
        return view('productos.edit', compact('producto','marcas','medidas','categorias','bodegaproductos','productoproveedores','productoofertas'));
    }

    public function editservicios(Producto $producto){  
        $productos = Producto::all()
        ->where('activo',true)
        ->where('servicio',false);
            
        $categorias = vw_categorias::all();  

        $servicioproducto= ServicioProducto::with('Producto')->get()
        ->where('servicio_id',$producto->id);
        //return $servicioproducto;

        $productoofertas= ofertaproducto::All()
        ->where('producto_id',$producto->id)
        ->where('activo',true);       

        return view('servicios.edit', compact('producto','productos','categorias','servicioproducto','productoofertas'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $texto=trim($request->get('texto'));
       $productos = DB::table('vw_productos')
                    ->select('*')
                    ->where('nombre','LIKE','%'.$texto.'%')
                    ->orwhere('codigo','LIKE','%'.$texto.'%')
                    ->orwhere('categoria','LIKE','%'.$texto.'%')
                    ->orwhere('marca','LIKE','%'.$texto.'%')                 
                    ->paginate(10);       

        return view('productos.index', compact('productos','texto'));
    }

    public function indexservicio(Request $request)
    {
        $texto=trim($request->get('texto'));
        $productos = DB::table('vw_servicios')
                     ->select('*')
                     ->where('nombre','LIKE','%'.$texto.'%')
                     ->orwhere('codigo','LIKE','%'.$texto.'%')
                     ->orwhere('categoria','LIKE','%'.$texto.'%')         
                     ->paginate(10);   

        return view('servicios.index', compact('productos','texto'));
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
            $producto = new Producto();
            $producto->empresa_id=1;           
            $producto->nombre=$request->nombre; 
            $producto->descripcion=$request->descripcion; 
            $producto->categoria_id=$request->categoria_id; 
            $producto->marca_id=$request->marca_id; 
            $producto->medida_id=$request->medida_id; 
            $producto->costopromedio=$request->costopromedio; 
            $producto->precio1=$request->precio1;   
            $producto->precio2=$request->precio2;   
            $producto->precio3=$request->precio3;  
            $producto->margenutilidad=$request->margenutilidad;  
            $producto->cantidadminima=$request->cantidadminima; 
            $producto->servicio=false; 
            $producto->save();

            //Guardamos en la bodega principal
            $bodegaproducto = new BodegaProducto();
            $bodegaproducto->producto_id=$producto->id;
            $bodegaproducto->almacen_id=1;
            $bodegaproducto->existencia=0;
            $bodegaproducto->save();

            //Actualizamos el codigo del producto
            $productoup = Producto::findOrFail($producto->id);
            $productoup->codigo='PR00' . strval($producto->id);
            $productoup->save();

        DB::commit();   
        }  
        catch(Exception $e){
            DB::rollback();
        }
        
        $notification='El producto ha sido creada correctamente.';
        return redirect('/productos')->with(compact('notification')); 
    }
    
    public function storeoferta(Request $request, Producto $producto)
    {       
            $oferta = new ofertaproducto();
            $oferta->empresa_id=$producto->empresa_id;           
            $oferta->producto_id=$producto->id;  
            $oferta->precio=$request->precio; 
            $oferta->cantidad=$request->cantidad; 
            $oferta->regalo=$request->regalo; 
            $oferta->fechainicio=$request->fechainicio=(new Carbon($request->fechaentrada))->format('Y-m-d');    
            $oferta->fechafin=$request->fechafin=(new Carbon($request->fechaentrada))->format('Y-m-d');

            $oferta->activo=true; 
            $oferta->save();        
       
        return redirect('/productos/' . $producto->id . '/edit');
    }


    public function storeservicio(Request $request)
    {
        try{
            DB::beginTransaction();
            $producto = new Producto();
            $producto->empresa_id=1; 
            $producto->codigo=$request->codigo; 
            $producto->nombre=$request->nombre; 
            $producto->descripcion=$request->descripcion; 
            $producto->categoria_id=$request->categoria_id; 
            $producto->marca_id=$request->marca_id; 
            $producto->medida_id=$request->medida_id; 
            $producto->costopromedio=$request->costopromedio; 
            $producto->precio1=$request->precio1;   
            $producto->precio2=$request->precio2;   
            $producto->precio3=$request->precio3;     
            $producto->margenutilidad=$request->margenutilidad;  
            $producto->cantidadminima=$request->cantidadminima; 
            $producto->servicio=true; 
            $producto->save();      
            
            //Actualizamos el codigo del producto
            $productoup = Producto::findOrFail($producto->id);
            $productoup->codigo='SE00' . strval($producto->id);
            $productoup->save();

            //Detalle de productos
            $producto_id=$request->get('producto_id');
            $cantidades=$request->get('cantidades');
          
            $cont=0;

            while ($cont < count($producto_id)){
                $detalle = new ServicioProducto();
                $detalle-> servicio_id=$producto->id;
                $detalle-> producto_id=$producto_id[$cont]; 
                $detalle-> cantidad =  $cantidades[$cont];
                $detalle-> save();
                $cont = $cont +1;
            }

        DB::commit();  
        
        }  
        catch(Exception $e){
            DB::rollback();
        }
      
        $notification='El servicio ha sido creada correctamente.';
        return redirect('/servicios')->with(compact('notification'));  
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */

     public function showservicio($id)
    {
       $servicio=DB::table('producto as s')
            ->select('s.producto_id, s.codigo, s.nombre, s.descripcion, s.categoria_id, s.margenutilidad, s.precio')
            ->where('producto_id','='.$id)
            ->first();

        $productosservicio=DB::table('servicio_productos as ps')
            ->join('producto as p', 'p.producto_id','='.'ps.producto_id')
            ->select('p.nombre  as producto, d.cantidad')
            ->where('producto_id','='.$id)
            ->get();

        return view("servicios.show",["servicio"=>$servicio,"detalle"=>$productosservicio]);    

    }

    public function show(Producto $producto)
    {
        $producto->marca=$producto->Marca;
        $producto->medida=$producto->Medida;
        $producto->categoria=$producto->Categoria;
        return $producto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->empresa_id=1;//$request->empresa_id;        
        $producto->nombre=$request->nombre; 
        $producto->descripcion=$request->descripcion; 
        $producto->categoria_id=$request->categoria_id; 
        $producto->marca_id=$request->marca_id; 
        $producto->medida_id=$request->medida_id; 
        $producto->costopromedio=$request->costopromedio;        
        $producto->precio1=$request->precio1;   
        $producto->precio2=$request->precio2;   
        $producto->precio3=$request->precio3;   
        $producto->margenutilidad=$request->margenutilidad;   
        $producto->cantidadminima=$request->cantidadminima; 
        $producto->servicio=false; 
        $producto->save();
        $notification='El producto ha sido actualizada correctamente.';      
        return redirect('/productos')->with(compact('notification'));
    }

    public function updateservicio(Request $request, Producto $producto)
    {
        try
        {
            DB::beginTransaction();
            $producto->empresa_id=1;//$request->empresa_id;       
            $producto->nombre=$request->nombre; 
            $producto->descripcion=$request->descripcion; 
            $producto->categoria_id=$request->categoria_id; 
            $producto->marca_id=$request->marca_id; 
            $producto->medida_id=$request->medida_id; 
            $producto->costopromedio=$request->costopromedio;        
            $producto->precio1=$request->precio1;   
            $producto->precio2=$request->precio2;   
            $producto->precio3=$request->precio3;    
            $producto->margenutilidad=$request->margenutilidad;   
            $producto->cantidadminima=$request->cantidadminima; 
            $producto->servicio=true; 
            $producto->save();

            //Eliminamos los productos  
            DB::table('servicio_productos')->where('servicio_id', '=', $producto->id)->delete();
              
             //Insertamos los productos nuevos
            $producto_id=$request->get('producto_id');
            $cantidades=$request->get('cantidades');
            
            $cont=0;

            while ($cont < count($producto_id)){
                $detalle = new ServicioProducto();
                $detalle-> servicio_id=$producto->id;
                $detalle-> producto_id=$producto_id[$cont]; 
                $detalle-> cantidad =  $cantidades[$cont];
                $detalle-> save();
                $cont = $cont +1;
            }           

            DB::commit();  
        
        }  
        catch(Exception $e){
            DB::rollback();
        }

            $notification='El servicio ha sido actualizada correctamente.';      
            return redirect('/servicios')->with(compact('notification'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->activo=false;     
        $producto->save();
        $notification='El producto ha sido inactivada correctamente.';      
        return redirect('/productos')->with(compact('notification'));
    }

    public function destroyoferta(ofertaproducto $oferta)
    {
        $oferta->activo=false;     
        $oferta->save();
        $notification='La oferta ha sido inactivada correctamente.';      
        return redirect('/productos')->with(compact('notification'));
    }
}
