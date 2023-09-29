<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_inventarios', function (Blueprint $table) {
            $table->id();
           
            $table->foreignId('entrada_id')->nullable()->constrained('entradas');
            $table->foreignId('salida_id')->nullable()->constrained('salidas');
            $table->foreignId('producto_id')->nullable()->constrained('productos');
            $table->foreignId('almacen_id')->nullable()->constrained('almacens');
           
            $table->decimal('compra',8,2)->default(0);
            $table->decimal('venta',8,2)->default(0);
            $table->decimal('cantidad',8,2)->default(0);         
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimiento_inventarios');
    }
};
