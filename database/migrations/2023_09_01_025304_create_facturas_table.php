<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->nullable()->constrained('empresas');
            $table->foreignId('sucursal_id')->nullable()->constrained('sucursals');
            $table->foreignId('caja_id')->nullable()->constrained('cajas');
            $table->foreignId('cliente_id')->nullable()->constrained('clientes');
            $table->foreignId('tipofactura_id')->nullable()->constrained('catalogos');
            $table->foreignId('formapago_id')->nullable()->constrained('catalogos');
            $table->foreignId('almacen_id')->nullable()->constrained('almacens');           
            $table->foreignId('vendedor_id')->nullable()->constrained('empleados');
            $table->foreignId('cajero_id')->nullable()->constrained('empleados');

            $table->string('numero')->nullable();
            $table->date('fecha')->nullable();
            $table->date('fechaanulada')->nullable();
            $table->decimal('subtotal', 8, 2)->nullable();
            $table->decimal('impuesto', 8, 2)->nullable();
            $table->decimal('descuento', 8, 2)->nullable();
            $table->decimal('total', 8, 2)->nullable();
            $table->decimal('tasacambio', 8, 2)->nullable();
            $table->decimal('prima', 8, 2)->nullable();
            $table->decimal('saldo', 8, 2)->nullable();
            $table->boolean('anulada')->default(false);
            $table->boolean('facturada')->default(false);
            $table->boolean('devuelta')->default(false);
            $table->string('comentarioanular')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
