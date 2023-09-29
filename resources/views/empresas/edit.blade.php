@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header ">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">
            <span class="glyphicon glyphicon-book"></span> Editar empresa</h5>          
        </div>
        <div class="col text-right">
          <a href="{{url('/empresas')}}" class="btn btn-sm btn-default">Regresar
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
      <form action="{{url('/empresas/'.$empresa->id)}}" method="POST"> 
          @csrf
          @method('PUT')

          <fieldset class="form-group">
            <label class="form-label" for="name"> Nombre </label>
            <input type="text" name="nombre" class="form-control"value="{{$empresa->nombre}}" require> </input>
        </fieldset>

        <fieldset class="form-group">
          <label class="form-label" for="lblruc">Número RUC</label>             
          <input type="text" name="ruc" class="form-control" value="{{$empresa->ruc}}" require> </input>
        </fieldset>

       
        <fieldset class="form-group">                
          <label class="form-label" for="nombrepais">Pais</label>
          <select class="form-control" name="pais_id">
            <option value=""> --Seleccione el pais--</option>
            @foreach ($paises as $pais)
            <option value="{{ $pais -> id }}"
              @if ($pais->id === $empresa->pais_id)
                      selected
                @endif
              > {{$pais -> nombre}} </option>
            @endforeach  
          </select>
      </fieldset>

        <fieldset class="form-group">
          <label class="form-label" for="lblcorreo">Correo electrónico</label>
          <input type="email" class="form-control" name="correo" placeholder="Correo" value="{{$empresa->correo}}">
        </fieldset>

        <fieldset class="form-group">
          <label for="lbltelefono"> Teléfono </label>
          <input type="text" name="telefono" class="form-control"  value="{{$empresa->telefono}}"> </input>
        </fieldset>

        <fieldset class="form-group">
          <label for="lbldireccion"> Dirección </label>
          <textarea rows="5"  name="direccion"  class="form-control" >{{$empresa->direccion}}</textarea>
        
        </fieldset>  

            <button type="submit" class="btn btn-sm btn-success" > Guardar empresa</button>
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
