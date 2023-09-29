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
        Schema::create('salida_detalles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('salida_id')->nullable()->constrained('entradas');
            $table->foreignId('producto_id')->nullable()->constrained('productos');
            $table->foreignId('almacen_id')->nullable()->constrained('almacens');
            $table->decimal('cantidad', 8, 2)->nullable();
            $table->decimal('existenciaanterior', 8, 2)->nullable();
            $table->decimal('costo', 8, 2)->nullable();

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
        Schema::dropIfExists('salida_detalles');
    }
};
