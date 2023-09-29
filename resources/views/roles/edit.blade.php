@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header ">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">
            <span class="glyphicon glyphicon-lock"></span> Editar rol</h5>
        </div>
        <div class="col text-right">
          <a href="{{url('/roles')}}" class="btn btn-sm btn-default">Regresar
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
       
        </div>
      </div>
    </div>
    
    <div class="card-body">
      @if($errors->any())
      @foreach($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-triangle"></i>
      <strong>Por favor!</strong> {{$error}}
      </div>
      @endforeach
      @endif
      
		<div class="box-typical box-typical-padding">
      <form action="{{url('/roles/'.$rol->id)}}" method="POST">   
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="name"> Nombre </label>
                <input type="text" name="nombre" class="form-control" value="{{ $rol->nombre}}" require> 
            </div>           
            <h5 class="m-t-lg with-border">Permisos a:</h5>

            <div class="card-block">
              <div class="row">
                <div class="col-md-3 col-sm-6">
                  <h6 class="m-t-lg with-border">Seguridad</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="roles" name="roles" @if ($rol->roles) checked @endif
                    />
                    <label for="roles">Roles</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="usuarios" name="usuarios"  @if ($rol->usuarios) checked @endif/>
                    <label for="usuarios">Usuarios</label>
                  </div>        
                </div>
                <div class="col-md-3 col-sm-6">
                  <h6 class="m-t-lg with-border">Configuracion</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="empresas" name="empresas"  @if ($rol->empresas) checked @endif/>
                    <label for="empresas">Empresas</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="parametros" name="parametros"  @if ($rol->parametros) checked @endif/>
                    <label for="parametros">Parametros</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="sucursales" name="sucursales"  @if ($rol->sucursales) checked @endif/>
                    <label for="sucursales">Sucursales</label>          
                  </div>  
                </div>
                <div class="col-md-3 col-sm-6">
                  <h6 class="m-t-lg with-border">Catalogos</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="cargos"  name="cargos" @if ($rol->cargos) checked @endif/>
                    <label for="cargos">Cargos</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="marcas" name="marcas"  @if ($rol->marcas) checked @endif/>
                    <label for="marcas">Marcas</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="categorias" name="categorias" @if ($rol->categorias) checked @endif/>
                    <label for="categorias">Categorias</label>          
                  </div> 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="tiposalidas" name="tiposalidas" @if ($rol->tiposalidas) checked @endif/>
                    <label for="tiposalidas">Tipos de salida</label>          
                  </div> 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="tipoentradas"  name="tipoentradas" @if ($rol->tipoentradas) checked @endif/>
                    <label for="tipoentradas">Tipos de entrada</label>          
                  </div>  
                </div>
                <div class="col-md-3 col-sm-6">
                  <h6 class="m-t-lg with-border">Inventario</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="almacenes"  name="almacenes"  @if ($rol->almacenes) checked @endif/>
                    <label for="almacenes">Almacenes</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="productos"  name="productos"  @if ($rol->productos) checked @endif/>
                    <label for="productos">Productos</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="servicios"  name="servicios"  @if ($rol->servicios) checked @endif/>
                    <label for="servicios">Servicios</label>          
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="proveedores"  name="proveedores"  @if ($rol->proveedores) checked @endif/>
                    <label for="proveedores">Proveedores</label>          
                  </div> 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="entradas"  name="entradas"  @if ($rol->entradas) checked @endif/>
                    <label for="entradas">Entradas</label>          
                  </div> 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="salidas"  name="salidas"  @if ($rol->salidas) checked @endif/>
                    <label for="salidas">Salidas</label>          
                  </div> 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="existencia"  name="existencia" @if ($rol->existencia) checked @endif/>
                    <label for="existencia">Existencia</label>          
                  </div> 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="kardex"  name="kardex" @if ($rol->kardex) checked @endif/>
                    <label for="kardex">Kardex</label>          
                  </div> 
                </div>
              </div><!--.row-->
              <div class="row">
                <div class="col-md-3 col-sm-6">
                  <h6 class="m-t-lg with-border">Citas</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="horarios"  name="horarios" @if ($rol->horarios) checked @endif/>
                    <label for="horarios">Programar horarios</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="asignarcitas"  name="asignarcitas" @if ($rol->asignarcitas) checked @endif/>
                    <label for="asignarcitas">Asignar citas</label>
                  </div>        
                </div>
                <div class="col-md-3 col-sm-6">
                  <h6 class="m-t-lg with-border">Caja</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="configuracioncajas"  name="configuracioncajas" @if ($rol->configuracioncajas) checked @endif/>
                    <label for="configuracioncajas">Configuracion de cajas</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="recibos"  name="recibos" @if ($rol->recibos) checked @endif/>
                    <label for="recibos">Recibos</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="depositos"  name="depositos" @if ($rol->depositos) checked @endif/>
                    <label for="depositos">Depositos</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="arqueocaja" name="arqueocaja" @if ($rol->arqueocaja) checked @endif/>
                    <label for="arqueocaja">Arqueo de caja</label>          
                  </div>  
                </div>
                <div class="col-md-3 col-sm-6">
                  <h6 class="m-t-lg with-border">Cuentas por pagar</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="devoluciones" name="devoluciones"  @if ($rol->devoluciones) checked @endif/>
                    <label for="devoluciones">Devoluciones</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="facturascompras" name="facturascompras" @if ($rol->facturascompras) checked @endif/>
                    <label for="facturascompras">Facturas de compra</label>
                  </div>  
                 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="ncproveedores" name="ncproveedores" @if ($rol->ncproveedores) checked @endif/>
                    <label for="ncproveedores">Notas de credito a proveedores</label>          
                  </div> 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="ecproveedores" name="ecproveedores" @if ($rol->ecproveedores) checked @endif/>
                    <label for="ecproveedores">Estados de cuenta</label>          
                  </div>  
                </div>
                <div class="col-md-3 col-sm-6">
                  <h6 class="m-t-lg with-border">Cuentas por cobrar</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="clientes" name="clientes" @if ($rol->clientes) checked @endif/>
                    <label for="clientes">Clientes</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="notascredito" name="notascredito" @if ($rol->notascredito) checked @endif/>
                    <label for="notascredito">Notas de credito</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="notasdebito" name="notasdebito" @if ($rol->notasdebito) checked @endif/>
                    <label for="notasdebito">Notas de debito</label>          
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="estadocuenta" name="estadocuenta" @if ($rol->estadocuenta) checked @endif/>
                    <label for="estadocuenta">Estados de cuenta</label>          
                  </div>          
                </div>
              </div><!--.row-->
        
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <h6 class="m-t-lg with-border">Contabilidad</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="parametroscontables" name="parametroscontables"  @if ($rol->parametroscontables) checked @endif/>
                    <label for="parametroscontables">Parametros contables</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="cuentascontables" name="cuentascontables"  @if ($rol->cuentascontables) checked @endif/>
                    <label for="cuentascontables">Cuentas contables</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="comprobantes" name="comprobantes" @if ($rol->comprobantes) checked @endif/>
                    <label for="comprobantes">Comprobantes</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="balancegeneral" name="balancegeneral" @if ($rol->balancegeneral) checked @endif/>
                    <label for="balancegeneral">Balance general</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="estadoresultado" name="estadoresultado" @if ($rol->estadoresultado) checked @endif/>
                    <label for="estadoresultado">Estado de resultado</label>
                  </div>                 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="balanzacomprobacion" name="balanzacomprobacion" @if ($rol->balanzacomprobacion) checked @endif/>
                    <label for="balanzacomprobacion">Balanza de comprobacion contables</label>
                  </div>      
                </div>
             
                <div class="col-md-6 col-sm-12">
                  <h6 class="m-t-lg with-border">Recursos humanos</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="empleados" name="empleados" @if ($rol->empleados) checked @endif/>
                    <label for="empleados">Empleados</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="vacaciones" name="vacaciones" @if ($rol->vacaciones) checked @endif/>
                    <label for="vacaciones">Vacaciones</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="comisiones" name="comisiones" @if ($rol->comisiones) checked @endif/>
                    <label for="comisiones">Comisiones</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="nomina" name="nomina" @if ($rol->nomina) checked @endif/>
                    <label for="nomina">Nomina</label>
                  </div>  
                    
                </div>
              </div><!--.row-->
            </div>          
           
            <button type="submit" class="btn btn-sm btn-success" > Actualizar rol</button>
        </form>
        </div>
    </div>
  </div>


@endsection