<?php

namespace App\Http\Controllers;

use App\Models\Catalogos;
use App\Models\ValorCatalogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth');
     }
 
     public function create()
     { 
         return view('catalogos.create');
     }
 
   public function edit(Catalogos $catalogo){          
      
        $valorcatalogo= ValorCatalogo::with('Catalogo')->get()
        ->where('catalogo_id',$catalogo->id);
        //return $servicioproducto;

        return view('catalogos.edit', compact('catalogo','valorcatalogo'));        
     }


    public function index()
    {
        $catalogos= Catalogos::all()
        ->where('activo',true);   

        return view('catalogos.index', compact('catalogos'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $catalogo = new Catalogos();
        $catalogo->nombre=$request->nombre;      
        $catalogo->save();

        $notification='El catalogo ha sido creada correctamente.';
        return redirect('/catalogos')->with(compact('notification'));      
    }

    /**
     * Display the specified resource.
     */
    public function show(Catalogos $catalogo)
    {
        return $catalogo;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catalogos $catalogo)   {
       // return $request;
        try
        {
            DB::beginTransaction();
            $catalogo->empresa_id=1;//$request->empresa_id;       
            $catalogo->nombre=$request->nombre;  
            $catalogo->descripcion=$request->descripcion;                 
            $catalogo->save();

            //Eliminamos los valores  
           // DB::table('valor_catalogos')->where('catalogo_id', '=', $catalogo->id)->delete();
              
             //Insertamos los productos nuevos
            $ids=$request->get('ids');
            $codigos=$request->get('codigo');
            $nombresvalores=$request->get('nombresvalores');
            
            $cont=0;

            while ($cont < count($codigos)){
                if ($ids[$cont]==0)
                {
                    $detalle = new ValorCatalogo();
                    $detalle-> catalogo_id=$catalogo->id;
                    $detalle-> codigo=$codigos[$cont]; 
                    $detalle-> descripcion =  $nombresvalores[$cont];
                    $detalle-> save();
                }
                $cont = $cont +1;
            }           

            DB::commit();  
        
        }  
        catch(Exception $e){
            DB::rollback();
        }
    
        $notification='El catalogo ha sido actualizada correctamente.';      
        return redirect('/catalogos')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalogos $catalogo)
    {
        $catalogo->activo=false;     
        $catalogo->save();
        $notification='El catalogo ha sido inactivada correctamente.';      
        return redirect('/catalogo')->with(compact('notification'));
    }
}
