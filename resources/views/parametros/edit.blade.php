@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header ">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">
            <span class="glyphicon glyphicon-book"></span> Editar parametros</h5>          
        </div>
        <div class="col text-right">
          <a href="{{url('/home')}}" class="btn btn-sm btn-default">Regresar
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
       
        </div>
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
      <form action="{{url('/parametros/'.$parametro->id)}}" method="POST">    
          @csrf
          @method('PUT')
            <div class="form-group">
                <label for="name"> Porcentaje impuesto </label>
                <input type="number" name="porcentajeimpuesto" class="form-control" value="{{ $parametro->porcentajeimpuesto}}" require> 
            </div>     

            <div class="form-group">
              <label for="name"> Porcentaje / utilidad  </label>
              <input type="number" name="porcentajeutilidad" class="form-control" value="{{ $parametro->porcentajeutilidad}}" require> 
            </div>    
            
            <div id ="monedas" class="input-group">  
              <div class="form-group">                
                <label class="form-label" for="nombrecategoria">Moneda primaria</label>                
                <select class="form-control" name="monedaprimaria_id">
                  <option value=""> --Seleccione la moneda primaria--</option>
                  @foreach ($monedas as $moneda)
                  <option value="{{ $moneda -> id }}"
                    @if ($moneda->id === $parametro->monedaprimaria_id)
                    selected
                    @endif> {{$moneda -> descripcion}} </option>
                  @endforeach  
                </select>
              </div>         
            </div><!-- /input-group -->
            <br>
            <div class="form-group">
            <div class="checkbox-toggle">
              <input type="checkbox" id="multimoneda" name="multimoneda"  @if ($parametro->multimoneda) checked @endif/>
              <label for="multimoneda">Multimoneda</label>
            </div>
          </div>
            

            <button type="submit" class="btn btn-sm btn-success" > Guardar parametros</button>
        </form>
        </div>
    </div>
  </div>



@endsection