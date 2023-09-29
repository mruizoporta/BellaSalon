<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodegaProducto extends Model
{
    use HasFactory;

    public function Producto(){
        return $this->belongsTo(Producto::class);
    }

    public function Almacen(){
        return $this->belongsTo(Almacen::class);
    }
}
