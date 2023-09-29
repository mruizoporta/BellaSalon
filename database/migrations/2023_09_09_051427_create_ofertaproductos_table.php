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
        Schema::create('ofertaproductos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->nullable()->constrained('productos');
            $table->foreignId('empresa_id')->nullable()->constrained('empresas');
            $table->decimal('precio', 8, 2)->nullable();
            $table->decimal('cantidad', 8, 2)->nullable();
            $table->decimal('regalo', 8, 2)->nullable();   
            $table->date('fechainicio')->nullable();
            $table->date('fechafin')->nullable();

            $table->boolean('activo')->default(true); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofertaproductos');
    }
};
