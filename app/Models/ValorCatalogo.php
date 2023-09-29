<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValorCatalogo extends Model
{
    use HasFactory;

    public function Catalogo(){
        return $this->belongsTo(Catalogos::class);
    }
}
