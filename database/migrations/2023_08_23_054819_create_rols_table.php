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
        Schema::create('rols', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();

            $table->boolean('roles')->default(false);
            $table->boolean('usuarios')->default(false);
            $table->boolean('empresas')->default(false);
            $table->boolean('parametros')->default(false);
            $table->boolean('sucursales')->default(false);
            $table->boolean('cargos')->default(false);
            $table->boolean('marcas')->default(false);
            $table->boolean('categorias')->default(false);
            $table->boolean('tiposalidas')->default(false);
            $table->boolean('tipoentradas')->default(false);
            $table->boolean('almacenes')->default(false);
            $table->boolean('productos')->default(false);
            $table->boolean('servicios')->default(false);
            $table->boolean('proveedores')->default(false);
            $table->boolean('entradas')->default(false);
            $table->boolean('salidas')->default(false);
            $table->boolean('existencia')->default(false);
            $table->boolean('kardex')->default(false);
            $table->boolean('horarios')->default(false);
            $table->boolean('asignarcitas')->default(false);
            $table->boolean('configuracioncajas')->default(false);
            $table->boolean('recibos')->default(false);
            $table->boolean('depositos')->default(false);
            $table->boolean('arqueocaja')->default(false);
            $table->boolean('devoluciones')->default(false);
            $table->boolean('facturascompras')->default(false);
            $table->boolean('categorias')->default(false);
            $table->boolean('ncproveedores')->default(false);
            $table->boolean('ecproveedores')->default(false);
            $table->boolean('clientes')->default(false);
            $table->boolean('notascredito')->default(false);
            $table->boolean('notasdebito')->default(false);
            $table->boolean('estadocuenta')->default(false);
            $table->boolean('balancegeneral')->default(false);
            $table->boolean('comprobantes')->default(false);
            $table->boolean('cuentascontables')->default(false);
            $table->boolean('estadoresultado')->default(false);
            $table->boolean('parametroscontables')->default(false);
            $table->boolean('balanzacomprobacion')->default(false);            
            $table->boolean('empleados')->default(false);
            $table->boolean('vacaciones')->default(false);
            $table->boolean('comisiones')->default(false);
            $table->boolean('nomina')->default(false);

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
        Schema::dropIfExists('rols');
    }
};
