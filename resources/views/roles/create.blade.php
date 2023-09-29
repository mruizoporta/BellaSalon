@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header ">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">
            <span class="glyphicon glyphicon-lock"></span> Nuevo rol</h5>
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
        <form action="{{url('/roles')}}" method="POST">
          @csrf
            <div class="form-group">
                <label for="name"> Nombre </label>
                <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" require> 
            </div>           
            <h5 class="m-t-lg with-border">Permisos a:</h5>

            <div class="card-block">
              <div class="row">
                <div class="col-md-3 col-sm-6">
                  <h6 class="m-t-lg with-border">Seguridad</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="roles" name="roles" />
                    <label for="roles">Roles</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="usuarios" name="usuarios" />
                    <label for="usuarios">Usuarios</label>
                  </div>        
                </div>
                <div class="col-md-3 col-sm-6">
                  <h6 class="m-t-lg with-border">Configuracion</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="empresas" name="empresas"/>
                    <label for="empresas">Empresas</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="parametros" name="parametros"/>
                    <label for="parametros">Parametros</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="sucursales" name="sucursales" />
                    <label for="sucursales">Sucursales</label>          
                  </div>  
                </div>
                <div class="col-md-3 col-sm-6">
                  <h6 class="m-t-lg with-border">Catalogos</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="cargos"  name="cargos"/>
                    <label for="cargos">Cargos</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="marcas" name="marcas"/>
                    <label for="marcas">Marcas</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="categorias" name="categorias"/>
                    <label for="categorias">Categorias</label>          
                  </div> 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="tiposalidas" name="tiposalidas"/>
                    <label for="tiposalidas">Tipos de salida</label>          
                  </div> 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="tipoentradas"  name="tiposalidas"/>
                    <label for="tipoentradas">Tipos de entrada</label>          
                  </div>  
                </div>
                <div class="col-md-3 col-sm-6">
                  <h6 class="m-t-lg with-border">Inventario</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="almacenes"  name="almacenes" />
                    <label for="almacenes">Almacenes</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="productos"  name="productos" />
                    <label for="productos">Productos</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="servicios"  name="servicios"/>
                    <label for="servicios">Servicios</label>          
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="proveedores"  name="proveedores" />
                    <label for="proveedores">Proveedores</label>          
                  </div> 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="entradas"  name="entradas"/>
                    <label for="entradas">Entradas</label>          
                  </div> 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="salidas"  name="salidas"/>
                    <label for="salidas">Salidas</label>          
                  </div> 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="existencia"  name="existencia"/>
                    <label for="existencia">Existencia</label>          
                  </div> 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="kardex"  name="kardex"/>
                    <label for="kardex">Kardex</label>          
                  </div> 
                </div>
              </div><!--.row-->
              <div class="row">
                <div class="col-md-3 col-sm-6">
                  <h6 class="m-t-lg with-border">Citas</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="horarios"  name="horarios"/>
                    <label for="horarios">Programar horarios</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="asignarcitas"  name="asignarcitas"/>
                    <label for="asignarcitas">Asignar citas</label>
                  </div>        
                </div>
                <div class="col-md-3 col-sm-6">
                  <h6 class="m-t-lg with-border">Caja</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="configuracioncajas"  name="configuracioncajas"/>
                    <label for="configuracioncajas">Configuracion de cajas</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="recibos"  name="recibos"/>
                    <label for="recibos">Recibos</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="depositos"  name="depositos"/>
                    <label for="depositos">Depositos</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="arqueocaja" name="arqueocaja"/>
                    <label for="arqueocaja">Arqueo de caja</label>          
                  </div>  
                </div>
                <div class="col-md-3 col-sm-6">
                  <h6 class="m-t-lg with-border">Cuentas por pagar</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="devoluciones" name="devoluciones" />
                    <label for="devoluciones">Devoluciones</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="facturascompras" name="facturascompras"/>
                    <label for="facturascompras">Facturas de compra</label>
                  </div>  
                 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="ncproveedores" name="ncproveedores"/>
                    <label for="ncproveedores">Notas de credito a proveedores</label>          
                  </div> 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="ecproveedores" name="ecproveedores"/>
                    <label for="ecproveedores">Estados de cuenta</label>          
                  </div>  
                </div>
                <div class="col-md-3 col-sm-6">
                  <h6 class="m-t-lg with-border">Cuentas por cobrar</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="clientes" name="clientes"/>
                    <label for="clientes">Clientes</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="notascredito" name="notascredito"/>
                    <label for="notascredito">Notas de credito</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="notasdebito" name="notasdebito"/>
                    <label for="notasdebito">Notas de debito</label>          
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="estadoresultado" name="estadoresultado"/>
                    <label for="estadoresultado">Estados de cuenta</label>          
                  </div>          
                </div>
              </div><!--.row-->
        
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <h6 class="m-t-lg with-border">Contabilidad</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="parametroscontables" name="parametroscontables" />
                    <label for="parametroscontables">Parametros contables</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="cuentascontables" name="cuentascontables" />
                    <label for="cuentascontables">Cuentas contables</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="comprobantes" name="comprobantes"/>
                    <label for="comprobantes">Comprobantes</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="balancegeneral" name="balancegeneral"/>
                    <label for="balancegeneral">Balance general</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="estadoresultado" name="estadoresultado"/>
                    <label for="estadoresultado">Estado de resultado</label>
                  </div>                 
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="balanzacomprobacion" name="balanzacomprobacion"/>
                    <label for="balanzacomprobacion">Balanza de comprobacion contables</label>
                  </div>      
                </div>
             
                <div class="col-md-6 col-sm-12">
                  <h6 class="m-t-lg with-border">Recursos humanos</h6>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="empleados" name="empleados"/>
                    <label for="empleados">Empleados</label>
                  </div>
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="vacaciones" name="vacaciones"/>
                    <label for="vacaciones">Vacaciones</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="comisiones" name="comisiones"/>
                    <label for="comisiones">Comisiones</label>
                  </div>  
                  <div class="checkbox-toggle">
                    <input type="checkbox" id="nomina" name="nomina"/>
                    <label for="nomina">Nomina</label>
                  </div>  
                    
                </div>
              </div><!--.row-->
            </div>          
           
            <button type="submit" class="btn btn-sm btn-success" > Crear rol</button>
        </form>
        </div>
    </div>
  </div>


@endsection