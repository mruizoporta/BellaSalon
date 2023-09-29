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
        Schema::create('tasacambios', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();
            $table->decimal('monto', 8, 4)->nullable();
            $table->foreignId('moneda_id')->nullable()->constrained('valor_catalogos'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasacambios');
    }
};
