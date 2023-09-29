<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horario extends Model
{
    use HasFactory;
    
    public function Empleado(){
        return $this->belongsTo(Empleado::class);
    }

    protected $fillable=[
        'day',
        'active',
        'morning_start',
        'morning_end',
        'afternoon_start',
        'afternoon_end',
        'empleado_id'
    ];
}
