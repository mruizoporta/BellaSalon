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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->nullable()->constrained('empresas');
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('identificacion')->nullable();
            $table->string('direccion')->nullable();

            $table->boolean('esjuridico')->default(true);
            $table->string('razonsocial')->nullable();           

            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();

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
        Schema::dropIfExists('personas');
    }
};
