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
        Schema::create('sucursals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('ruc')->nullable();
            $table->string('direccion')->nullable();           
            $table->string('telefono')->nullable();
            $table->string('web')->nullable();
            $table->string('correo')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('activo')->default(true);
            $table->foreignId('empresa_id')->nullable()->constrained('empresas');
            $table->foreignId('pais_id')->nullable()->constrained('pais');
            $table->foreignId('ciudad_id')->nullable()->constrained('ciudads');
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
        Schema::dropIfExists('sucursals');
    }
};
