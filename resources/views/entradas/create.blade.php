@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header ">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">
            <span class="glyphicon glyphicon-book"></span> Nueva entrada a inventario</h5>          
        </div>
        <div class="col text-right">
          <a href="{{url('/entradas')}}" class="btn btn-sm btn-default">Regresar
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
        <form action="{{url('/entradas')}}" method="POST">
          @csrf

          <div class="row">
            <div class="col-lg-6">
              <div class="input-group">  
                <div class="form-group">                
                  <label class="form-label" for="nombrecategoria">Sucursal</label>                
                  <select class="form-control" name="proveedor_id">                   
                    @foreach ($sucursales as $sucursal)
                    <option value="{{ $sucursal -> id }}"> {{$sucursal -> nombre}} </option>
                    @endforeach  
                  </select>
                </div>         
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->

            <div class="col-lg-6">
              <div class="input-group">  
                <div class="form-group">                
                  <label class="form-label" for="nombrealmacen">Almacen</label>                
                  <select class="form-control" name="almacen_id">
                    <option value=""> --Seleccione el almacen--</option>
                    @foreach ($almacenes as $almacen)
                    <option value="{{ $almacen -> id }}"> {{$almacen -> nombre}} </option>
                    @endforeach  
                  </select>
                </div>         
              </div><!-- /input-group -->           
          </div>

          </div>  
          <div class="row">
       
            <div class="col-lg-6">
              <div class="input-group">  
                <div class="form-group">                
                  <label class="form-label" for="nombrecategoria">Proveedor</label>                
                  <select class="form-control" name="proveedor_id">
                    <option value=""> --Seleccione el proveedor--</option>
                    @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor -> id }}"> {{$proveedor -> razonsocial}} </option>
                    @endforeach  
                  </select>
                </div>         
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
           
            <div class="col-lg-6">
              <div class="input-group">  
                <div class="form-group">                
                  <label class="form-label" for="nombrecategoria">Tipo de entrada</label>                
                  <select class="form-control" name="tipoentrada_id">
                    <option value=""> --Seleccione el tipo de entrada--</option>
                    @foreach ($tiposentrada as $tipoentrada)
                    <option value="{{ $tipoentrada -> id }}"> {{$tipoentrada -> descripcion}} </option>
                    @endforeach  
                  </select>
                </div>         
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
          </div>

          <div class="row">

            <div class="col-lg-6">              
              <div class="input-group"> 
                <fieldset class="form-group">
                  <label class="form-label" for="name"> Número de factura </label>
                  <input type="text" name="numerofactura" class="form-control" value="{{old('numerofactura')}}" require> 
                </fieldset>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
       
            <div class="col-lg-6">

              <div class="form-group">
								<div class='input-group date datetimepicker'>
									<input id="daterange3" type="text" value="10/24/1984" name ="fechaentrada" class="form-control">
									<span class="input-group-addon">
										<i class="font-icon font-icon-calend"></i>
									</span>
								</div>
							</div>

            {{--   <div class="form-group">
								<div class='input-group date datetimepicker-1'>
									<input type='text' class="form-control" name ="fechaentrada"/>
								<span class="input-group-addon">
									<i class="font-icon font-icon-calend"></i>
								</span>
								</div>
							</div> --}}

           {{--    <fieldset class="form-group">
								<label class="form-label" for="date-mask-input">Fecha de la entrada</label>
								<input type="text" class="form-control" id="date-mask-input" name ="fechaentrada">							
							</fieldset>   --}}
            </div><!-- /.col-lg-6 -->
          </div>

          <div class="row">
            <div class="col-lg-12">              
              <div class="input-group"> 
                <fieldset class="form-group">
                  <label class="form-label" for="name"> Concepto </label>
                  <input type="text" name="concepto" class="form-control" value="{{old('concepto')}}" require> 
                </fieldset>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </div>
        <input type="hidden" name="totalentrada" id="totalentrada" class="form-control" value="{{old('totalentrada')}}" />

      <h5 class="m-t-lg with-border">Detalle de los Productos</h5>

      <div class="row">
       
        <div class="col-lg-12">
          <div class="input-group">  
            <div class="form-group">                
              <label class="form-label" for="nombreproducto">Producto</label>                
              <select class="form-control" id ="productoid" name="productoid">
                <option value=""> --Seleccione el producto--</option>
                @foreach ($productos as $producto)
                <option value="{{ $producto -> id }}"> {{$producto -> nombre}} </option>
                @endforeach  
              </select>
            </div>         
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
      </div>


      <div class="row">
         
        <div class="col-lg-6">
          <div class="input-group">  
            <fieldset class="form-group">
              <label class="form-label" for="lblpreciocontado">Cantidad</label>
              <input type="number" class="form-control" name="cantidad" id="cantidad"  >
            </fieldset>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->

        <div class="col-lg-6">
          <div class="input-group">  
            <fieldset class="form-group">
              <label for="lblmargenutilidadcredito"> Costo </label>
              <input type="text" name="costo" id="costo" class="form-control"  >
            </fieldset>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
      </div>

      <div class="row">         
      
      <div class="col text-center">     

      <button type="button" id ="bt_add"  class="btn btn-sm btn-default">
      <span class="glyphicon glyphicon-plus"></span></button> 

   </div><!-- /.col-lg-6 -->
   <br>
      </div>
      <div class="table-responsive">
        <table id="table-productos" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>   
                <th>Precio</th>
                <th>Sub Total</th>
                <th>Opciones</th>                  
            </tr>
            </thead>
            <tfoot>
              <th>Total</th>
              <th></th>
              <th></th>
              <th></th>
              <th><h4 name="total" id ="total">C$ 0.00 </h4></th>
            </tfoot>
            <tbody id="tableproductos">
            </tbody>          
        </table>      
    </div> 

            <button id="guardar" type="submit" class="btn btn-sm btn-success" > Registrar entrada</button>
            <br>
            <br>
        </form>
        </div>
    </div>
  </div>

  @push('scrips')

  <script src="{{ asset('js/lib/jquery/jquery.min.js')}}"></script>
	<script src="{{ asset('js/lib/tether/tether.min.js')}}"></script>
	<script src="{{ asset('js/lib/bootstrap/bootstrap.min.js')}}"></script>
	<script src="{{ asset('js/plugins.js')}}"></script>

	<script type="text/javascript" src="{{ asset('js/lib/moment/moment-with-locales.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/lib/eonasdan-bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
	<script src="{{ asset('js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
	<script src="{{ asset('js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>
	<script src="{{ asset('js/lib/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>

  <script src="../js/entradas/create.js"></script>

  @endpush
      

@endsection

@section('scripts')

 

    {{-- <script src="{{ asset('js/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('js/lib/tether/tether.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/plugins.js')}}"></script>
     <script src="{{ asset('js/app.js')}}"></script> 

    <script src="{{ asset('js/lib/jquery-tag-editor/jquery.caret.min.js')}}"></script>
    <script src="{{ asset('js/lib/jquery-tag-editor/jquery.tag-editor.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    
    <script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('js/lib/select2/select2.full.min.js')}}"></script>

    <script src="{{ asset('js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{ asset('js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>
    
    <script src="js/lib/jquery/jquery.min.js')}}"></script> --}}

    

    <script>
      $(function() {
        $('#tags-editor-textarea').tagEditor();
      });
    </script>


 
@endsection

