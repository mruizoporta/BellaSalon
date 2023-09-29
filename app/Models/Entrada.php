<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    public function Empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function Proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    public function Almacen(){
        return $this->belongsTo(Almacen::class);
    }

   

}
