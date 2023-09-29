<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    public function Empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function Almacen(){
        return $this->belongsTo(Almacen::class);
    }

    public function TpoSalida(){
        return $this->belongsTo(TpoEntrada::class);
    }

}
