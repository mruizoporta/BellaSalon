<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioProducto extends Model
{
    use HasFactory;

    public function Producto(){
        return $this->belongsTo(Producto::class);
    }

    public function Servicio(){
        return $this->belongsTo(Producto::class);
    }
}
