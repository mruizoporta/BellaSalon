<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    public function Empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function Persona(){
        return $this->belongsTo(Persona::class);
    }
}
