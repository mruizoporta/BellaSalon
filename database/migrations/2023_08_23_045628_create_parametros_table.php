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
        Schema::create('parametros', function (Blueprint $table) {
            $table->id();
            $table->integer('empresa_id')->nullable()->constrained('empresas');
            $table->decimal('porcentajeimpuesto', 8, 2)->nullable();
            $table->decimal('porcentajeutilidadcontado', 8, 2)->nullable();
            $table->decimal('porcentajeutilidadcredito', 8, 2)->nullable();
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
        Schema::dropIfExists('parametros');
    }
};
