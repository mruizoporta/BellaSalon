<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntradaDetalle extends Model
{
    use HasFactory;

    public function Entrada(){
        return $this->belongsTo(Entrada::class);
    }

    public function Producto(){
        return $this->belongsTo(Producto::class);
    }

    public function Almacen(){
        return $this->belongsTo(Almacen::class);
    }
}
