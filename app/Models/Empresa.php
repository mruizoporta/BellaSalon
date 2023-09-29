<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    public function Sucursal(){
        return $this->belongsTo(Sucursal::class);
    }

    public function pais(){
        return $this->belongsTo(Pais::class,'pais_id','id');
    }
}
