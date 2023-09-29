@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header ">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">
            <span class="glyphicon glyphicon-book"></span> Agregar empleado</h5>          
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
      <form action="{{url('/empleados')}}" method="POST" enctype="multipart/form-data">
          @csrf  
            <fieldset class="form-group">
                <label class="form-label" for="lblnombres"> Nombres </label>
                <input type="text" name="nombres" class="form-control" value="{{old('nombres')}}" require> 
            </fieldset>

            <fieldset class="form-group">
              <label class="form-label" for="lblnombres"> Apellidos </label>
              <input type="text" name="apellidos" class="form-control" value="{{old('apellidos')}}" require> 
          </fieldset>


            <fieldset class="form-group">
							<label class="form-label" for="lblidentificacion">Identificacion</label>             
              <input type="text" name="identificacion" class="form-control" value="{{old('identificacion')}}" require>
            </fieldset>  

            <fieldset class="form-group">
							<label class="form-label" for="lblcorreo">Correo electrónico </label>
							<input type="correo" class="form-control" name="correo" placeholder="correo electrónico" value="{{old('correo')}}">
						</fieldset>

            <fieldset class="form-group">
              <label for="lbltelefono"> Telefono / Movil </label>
              <input type="text" name="telefono" class="form-control"  value="{{old('telefono')}}"> 
            </fieldset>           

          <fieldset class="form-group">
            <label for="lblintereses">Direccion </label>
            <textarea rows="5"  name="direccion"  class="form-control"  value="{{old('direccion')}}" ></textarea>
          
          </fieldset>      
         
          <div class="input-group">  
            <div class="form-group">                
              <label class="form-label" for="cargo">Cargo</label>                
              <select class="form-control" name="cargo_id">
                <option value=""> --Seleccione el cargo--</option>
                @foreach ($cargos as $cargo)
                <option value="{{ $cargo -> id }}"> {{$cargo -> descripcion}} </option>
                @endforeach  
              </select>
            </div>     
          </div>   
            <fieldset class="form-group">
              <label class="form-label" for="date-mask-input">Fecha de ingreso</label>
              <input type="text" class="form-control" id="date-mask-input" name="fechaingreso">							
            </fieldset> 

            <button type="submit" class="btn btn-sm btn-success" > Guardar empleado</button>
            <br>
            <br>
        </form>
        </div>
    </div>
  </div>
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
