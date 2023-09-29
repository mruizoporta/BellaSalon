<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosEmpleado extends Model
{
    use HasFactory;

    
    public function Producto(){
        return $this->belongsTo(Producto::class);
    }

    public function Empleado(){
        return $this->belongsTo(Empleado::class);
    }
}
