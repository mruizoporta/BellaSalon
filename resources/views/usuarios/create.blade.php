@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header ">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">
            <span class="glyphicon glyphicon-book"></span> Nuevo usuario</h5>          
        </div>
        <div class="col text-right">
          <a href="{{url('/usuarios')}}" class="btn btn-sm btn-default">Regresar
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
      <form action="{{url('/usuarios')}}" method="POST">      
          @csrf

          <fieldset class="form-group">
            <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>
            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </fieldset>

          <div class="form-group">                
            <label class="form-label" for="nombrerol">Rol</label>                
            <select class="form-control" name="rol_id">
              <option value=""> --Seleccione el rol--</option>
              @foreach ($roles as $rol)
              <option value="{{ $rol -> id }}"> {{$rol -> nombre}} </option>
              @endforeach  
            </select>
          </div>


            <fieldset class="form-group">
              <label for="email" class="col-md-4 col-form-label text-md-end">Correo electrónico</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </fieldset>

            
            <fieldset class="form-group">
              <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña </label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </fieldset>

            <fieldset class="form-group">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmar contraseña</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          
            </fieldset>

            <button type="submit" class="btn btn-sm btn-success">
              Crear usuario
          </button>
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
    {{-- <script src="{{ asset('js/app.js')}}"></script> --}}

    <script src="{{ asset('js/lib/jquery-tag-editor/jquery.caret.min.js')}}"></script>
    <script src="{{ asset('js/lib/jquery-tag-editor/jquery.tag-editor.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('js/lib/select2/select2.full.min.js')}}"></script>

    <script>
      $(function() {
        $('#tags-editor-textarea').tagEditor();
      });
    </script>

@endsection



