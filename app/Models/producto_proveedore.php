<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto_proveedore extends Model
{
    use HasFactory;

    public function Producto(){
        return $this->belongsTo(Producto::class);
    }

    public function Proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
}
