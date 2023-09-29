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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('ruc')->nullable();
            $table->string('direccion')->nullable();           
            $table->string('telefono')->nullable();
            $table->string('web')->nullable();
            $table->string('correo')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('activo')->default(true);
            $table->integer('pais_id')->nullable()->constrained('pais');
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
        Schema::dropIfExists('empresas');
    }
};
