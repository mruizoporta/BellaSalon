@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header ">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">
            <span class="glyphicon glyphicon-book"></span> Agregar proveedor</h5>          
        </div>
        <div class="col text-right">
          <a href="{{url('/proveedores')}}" class="btn btn-sm btn-default">Regresar
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
      <form action="{{url('/proveedores')}}" method="POST" enctype="multipart/form-data">
          @csrf  
          <div class="row">
           <div class="col-lg-6">
            <fieldset class="form-group">
                <label class="form-label" for="lblrazonsocial"> Razon Social </label>
                <input type="text" name="razonsocial" class="form-control" value="{{old('razonsocial')}}" require> </input>
            </fieldset>
          </div>
          <div class="col-lg-6">
            <fieldset class="form-group">
							<label class="form-label" for="lblidentificacion">Número RUC</label>             
              <input type="text" name="identificacion" class="form-control" value="{{old('identificacion')}}" require> </input>
            </fieldset>  
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <fieldset class="form-group">
							<label class="form-label" for="lblcorreo">Correo electrónico </label>
							<input type="correo" class="form-control" name="correo" placeholder="correo electrónico" value="{{old('correo')}}">
						</fieldset>
          </div>
            <div class="col-lg-6">
            <fieldset class="form-group">
              <label for="lbltelefono"> Telefono / Movil </label>
              <input type="text" name="telefono" class="form-control"  value="{{old('telefono')}}"> </input>
            </fieldset>           
          </div>
        </div>
          <fieldset class="form-group">
            <label for="lblintereses">Direccion </label>
            <textarea rows="5"  name="direccion"  class="form-control"  value="{{old('direccion')}}" ></textarea>
          
          </fieldset>      
         
          <h5 class="m-t-lg with-border">Informacion del contacto</h5>

          <fieldset class="form-group">
            <label class="form-label" for="lblnombrecontacto"> Nombre </label>
            <input type="text" name="nombrecontacto" class="form-control" value="{{old('nombrecontacto')}}" require> 
          </fieldset>
          <div class="row">
          <div class="col-lg-6">
            <fieldset class="form-group">
              <label class="form-label" for="lblcorreocontacto">Correo electrónico </label>
              <input type="correo" class="form-control" name="correocontacto" placeholder="correo electrónico" value="{{old('correocontacto')}}">
            </fieldset>
          </div> 
          <div class="col-lg-6">
          <fieldset class="form-group">
            <label for="lbltelefonocontacto"> Telefono / Movil </label>
            <input type="text" name="telefonocontacto" class="form-control"  value="{{old('telefonocontacto')}}"> 
          </fieldset>   
        </div>
      </div>
            <button type="submit" class="btn btn-sm btn-success" > Guardar proveedor</button>
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
