<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginFormRequest;
use App\Models\Rol;
use App\Models\vw_sucursales_usuarios;
use App\Models\Sucursal;
use App\Models\sucursalusuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $roles = Rol::all()
        ->where('activo',true);  

        $sucursales = sucursals::all()
        ->where('activo',true);      
            
        $sucursalusuarios = sucursalusuario::with('Sucursal')->get();
    
        return view('usuarios.create', compact('roles','sucursalusuarios','sucursales'));
    }

  public function edit(User $usuario){  
    $roles = Rol::all()
    ->where('activo',true);  

    $sucursales = Sucursal::all()
    ->where('activo',true);      
        
    $sucursalusuarios = sucursalusuario::with('Sucursal')->get();

    return view('usuarios.edit', compact('usuario','roles','sucursales','sucursalusuarios'));
    }

    public function index()
    {
        $usuarios= User::with('rol')->get()
        ->where('activo',true);   

        return view('usuarios.index', compact('usuarios'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            DB::beginTransaction();
            $user = new User();
            $user->nombre = $request->nombre;
            $user->email = $request->email;
            $user->username = $request->email;
            $user->password = Hash::make($request->password);
            $user->rol_id = $request->rol_id;        
            $user->save();

            //Insertamos las sucursales nuevas
            $sucursal_id=$request->get('sucursal_id');                
            $cont=0;

            while ($cont < count($sucursal_id)){
                $detalle = new sucursalusuario();
                $detalle-> user_id=$user->id;
                $detalle-> sucursal_id=$sucursal_id[$cont];                    
                $detalle-> save();
                $cont = $cont +1;
            }   
            DB::commit();  
        
        }  
        catch(Exception $e){
            DB::rollback();
        }

        $notification='El usuario ha sido creada correctamente.';
        return redirect('/usuarios')->with(compact('notification')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        try
        {
            DB::beginTransaction();
                $usuario->nombre = $request->nombre;
                $usuario->email = $request->email;
                $usuario->username = $request->username;
                
                $usuario->save();
               
               /* $userup = User::findOrFail($user->id);
                $userup->nombre=$request->nombre;
                $userup->save();*/

                //Eliminamos las sucursales  
                DB::table('sucursalusuarios')->where('user_id', '=', $usuario->id)->delete();
                
                //Insertamos las sucursales nuevas
                $sucursal_id=$request->get('sucursal_id');                
                $cont=0;

                while ($cont < count($sucursal_id)){
                    $detalle = new sucursalusuario();
                    $detalle-> user_id=$usuario->id;
                    $detalle-> sucursal_id=$sucursal_id[$cont];                    
                    $detalle-> save();
                    $cont = $cont +1;
                }   
            DB::commit();  
        
            }  
            catch(Exception $e){
                DB::rollback();
            }
            

        $notification='El usuario ha sido actualizado correctamente.';
        return redirect('/usuarios')->with(compact('notification')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->nombre = $user->nombre;
        $user->email = $user->email;
        $user->username = $user->email;
        $user->password = Hash::make($user->password);
        $user->rol_id = $user->rol_id;        
        $user->activo = false;
        $user->save();
        $notification='El usuario ha sido inactivado correctamente.';
        return redirect('/usuarios')->with(compact('notification')); 
    }

    public function login(LoginFormRequest $request)
    {      
         if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],false)){
            $user = Auth::user();
            return $user;
        }else{
            return response()->json(['errors'=>['login'=>['Los datos no son validos']]]);
        } 
    }
}
