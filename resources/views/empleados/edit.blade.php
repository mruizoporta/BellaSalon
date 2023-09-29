@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header ">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">
            <span class="glyphicon glyphicon-book"></span> Editar empleado</h5>          
        </div>
        <div class="col text-right">
          <a href="{{url('/empleados')}}" class="btn btn-sm btn-default">Regresar
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
      <form action="{{url('/empleados/'.$empleado->id)}}" method="POST"> 
        @csrf
        @method('PUT')
            <fieldset class="form-group">
                <label class="form-label" for="lblnombre"> Nombres </label>
                <input type="text" name="nombres" class="form-control" value="{{$empleado->persona->nombres}}" require> 
            </fieldset>

            <fieldset class="form-group">
              <label class="form-label" for="lblapellidos"> Apellidos </label>
              <input type="text" name="apellidos" class="form-control" value="{{$empleado->persona->apellidos}}" require> 
          </fieldset>


            <fieldset class="form-group">
							<label class="form-label" for="lblidentificacion">Identificacion</label>             
              <input type="text" name="identificacion" class="form-control" value="{{$empleado->persona->identificacion}}" require> 
            </fieldset>  

            <fieldset class="form-group">
							<label class="form-label" for="lblcorreo">Correo electrónico</label>
							<input type="correo" class="form-control" name="correo" placeholder="correo electrónico" value="{{$empleado->persona->correo}}">
						</fieldset>

            <fieldset class="form-group">
              <label for="lbltelefono"> Telefono / Movil </label>
              <input type="text" name="telefono" class="form-control"  value="{{$empleado->persona->telefono}}"> 
            </fieldset>           

          <fieldset class="form-group">
            <label for="lblintereses">Direccion </label>
            <textarea rows="5"  name="direccion"  class="form-control" >{{$empleado->persona->direccion}}</textarea>
          
          </fieldset>     
       
      
          <div class="input-group">  
            <div class="form-group">                
              <label class="form-label" for="cargo">Cargo</label>                
              <select class="form-control" name="cargo_id">
                <option value=""> --Seleccione el cargo--</option>
                @foreach ($cargos as $cargo)
                <option value="{{ $cargo -> id }}"                  
                  @if ($cargo->id === $empleado->cargo_id)
                  selected
                  @endif> {{$cargo -> descripcion}} </option>
                @endforeach  
              </select>
            </div>     
          </div>   

          <h5 class="m-t-lg with-border">Detalle de servicios que brinda</h5>
    
          <div class="row">
             
            <div class="col-lg-6">
              <div class="input-group">  
                <fieldset class="form-group">
                  <label class="form-label" for="lblpreciocontado">Cantidad</label>
                  <div class="row">
                    <div class="col-lg-6">
                      <select name="producto_id"  id="producto_id" class="select2">
                        @foreach ($productos as $producto)
                        <option value="{{ $producto -> id }}"> {{$producto -> nombre}} </option>
                        @endforeach  
                      </select>
                    </div>
                    <div class="col-lg-6">
                    <a onclick="agregar();"  class="btn btn-sm btn-default">
                      <span class="glyphicon glyphicon-plus"></span>
                    </a>
                    </div>
                  </div>
                </fieldset>
              </div><!-- /input-group -->
             
            </div><!-- /.col-lg-6 -->
  
            <div class="col-lg-6">
              <div class="table-responsive">
                <table id="table-productos" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Servicio</th>                      
                        <th>Opciones</th>                  
                    </tr>
                    </thead>
                   
                    <tbody id="tableproductos">
        
                      @foreach($servicios as $sproducto)
                      <tr>                 
                          <td> 
                            <input  type="hidden" name="producto_id[]" value="{{$sproducto->producto_id}}" />                          
                            {{$sproducto-> Producto -> nombre}} </td>                        
                          <td>
                            <button type="button" onclick="eliminar('${producto_id}')" class="tabledit-edit-button btn btn-sm btn-default" >
                                            <span class="glyphicon glyphicon-trash"></span>
                                          </button>                         
                          </td>
                      </tr>
                      @endforeach
  
                    </tbody>
                  
                </table>      
            </div> 
            </div>
          </div>

            <button type="submit" class="btn btn-sm btn-success" > Actualizar empleados</button>
            <br>
            <br>
        </form>
        </div>
    </div>
  </div>

  @push('scrips')

  <script>

    $(function() {
      $('#tags-editor-textarea').tagEditor();
    });
    
    
        function agregar() {
          let producto_id = $("#producto_id option:selected").val();
          let producto_text = $("#producto_id option:selected").text();       
          
          if (producto_id.length > 0 ) {
        
              $("#tableproductos").append(`
                      <tr id="tr-${producto_id}">
                          <td>
                              <input type="hidden" name="producto_id[]" value="${producto_id}" />
                              ${producto_text}    
                          </td>                        
                          <td>
                            <button type="button" onclick="eliminar(${producto_id})" class="tabledit-edit-button btn btn-sm btn-default" >
                                            <span class="glyphicon glyphicon-trash"></span>
                                          </button>
    
                           
                          </td>
                      </tr>
    
                  `);
            
          } else {
              alert("Se debe ingresar una cantidad valido");
          }
        }
        
        
        function eliminar(id) {
          $("#tr-" + id).remove();
         
        }    
        </script>



  @endpush

@endsection

@section('scripts')
    <script src="{{ asset('js/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('js/lib/tether/tether.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/plugins.js')}}"></script>

    <script src="{{ asset('js/lib/jquery-tag-editor/jquery.caret.min.js')}}"></script>
    <script src="{{ asset('js/lib/jquery-tag-editor/jquery.tag-editor.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>


@endsection

