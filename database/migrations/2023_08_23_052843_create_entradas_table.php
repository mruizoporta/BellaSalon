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
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('empresa_id')->nullable()->constrained('empresas');
            $table->foreignId('tipoentrada_id')->nullable()->constrained('catalogos');
            $table->foreignId('almacen_id')->nullable()->constrained('almacens');
            $table->foreignId('proveedor_id')->nullable()->constrained('proveedors');

            $table->string('numerofactura')->nullable();
            $table->date('fechafactura')->nullable();
            $table->date('fechaentrada')->nullable();
          
            $table->boolean('anulada')->default(true);
            $table->string('comentarioanular')->nullable();
            $table->boolean('activo')->default(true);
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
        Schema::dropIfExists('entradas');
    }
};
