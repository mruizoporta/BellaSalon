<?php

namespace App\Http\Controllers;

use App\Models\horario;
use App\Models\vw_empleados;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HorarioController extends Controller
{
    private  $days=[
        'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo'
    ];

    public function edit(){
        $empleados = vw_empleados::All();

        $horarios = horario::where('empleado_id', auth()->id())->get();
        echo "<script>console.log('entro a editar' );</script>";
        if(count($horarios)>0){
        $horarios ->map(function($horarios){
            $horarios->morning_start = (new Carbon($horarios->morning_start))->format('g:i A');
            $horarios->morning_end = (new Carbon($horarios->morning_end))->format('g:i A');
            $horarios->afternoon_start = (new Carbon($horarios->afternoon_start))->format('g:i A');
            $horarios->afternoon_end = (new Carbon($horarios->afternoon_end))->format('g:i A');
        });}else{
            $horarios=collect();
            for($i=0; $i<7; ++$i)
                $horarios -> push(new horario());               
        }
        $days = $this->days;
       
        return view ('empleados.horario', compact('days','horarios','empleados'));
    }

    public function store(Request $request){

        $active=$request->input('active')?:[];
        $morning_start=$request->input('morning_start')?:[];
        $morning_end=$request->input('morning_end')?:[];
        $afternoon_start=$request->input('afternoon_start')?:[];
        $afternoon_end=$request->input('afternoon_end')?:[];

        $errors=[];

        for($i=0; $i<7; ++$i){
            if($morning_start[$i] > $morning_end[$i]){
                $errors []='Inconsistencia en el intervalo de las horas del turno de la manana del dia ' . $this->days[$i].'.';
            }

            if($afternoon_start[$i] > $afternoon_end[$i]){
                $errors []='Inconsistencia en el intervalo de las horas del turno de la tarde del dia ' . $this->days[$i].'.';
            }

            horario::updateOrCreate(
                [
                    'day'=> $i, 
                    'empleado_id' => auth()->id()
                ],
                [
                    'active'=> in_array($i,$active), 
                    'morning_start'=> $morning_start[$i],
                    'morning_end'=> $morning_end[$i],
                    'afternoon_start'=> $afternoon_start[$i], 
                    'afternoon_end'=> $afternoon_end[$i]
                ]
            );
        }
        if(count($errors)>0)
            return back()->with(compact('errors'));
        $notification = 'Los cambios se han guardado correctamente.'  ;
        return back()->with(compact('notification'));
    }
}
