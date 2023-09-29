@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header ">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">
            <span class="glyphicon glyphicon-book"></span> Nuevo catalogo</h5>          
        </div>
        <div class="col text-right">
          <a href="{{url('/catalogos')}}" class="btn btn-sm btn-default">Regresar
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
       
          <form action="{{url('/catalogos/'.$catalogo->id)}}" method="POST"> 
            @csrf
            @method('PUT')
    
          <div class="row">

              <div class="col-lg-8">
                <div class="input-group"> 
                  <fieldset class="form-group">
                      <label class="form-label" for="name"> Nombre </label>
                      <input type="text" name="nombre" class="form-control" value="{{$catalogo->nombre}}" require> 
                  </fieldset>
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->

                 
            <div class="col-lg-8">
              <div class="input-group"> 
                <fieldset class="form-group">
                  <label for="lblintereses">Descripcion </label>
                  <textarea rows="3"  name="descripcion"  class="form-control" >{{ $catalogo->descripcion}}</textarea>                
                </fieldset>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->

          </div>


        <h5 class="m-t-lg with-border">Detalle de valores</h5>

        <div class="row">
         
          <div class="col-lg-4">          
              <div class="form-group">                
                <div class="input-group"> 
                  <fieldset class="form-group">
                      <label class="form-label" for="name"> Codigo </label>
                      <input type="text" name="codigo" id="codigo"  class="form-control" > 
                  </fieldset>
                </div><!-- /input-group -->
              </div>      
          </div><!-- /.col-lg-6 -->
        </div>
  
  
        <div class="row">
           
          <div class="col-lg-6">
            <div class="input-group">  
              <fieldset class="form-group">
                <label class="form-label" for="lblnombrevalor">Nombre</label>
                <div class="row">
                  <div class="col-lg-8">
                    <input type="text" class="form-control" name="nombrevalor" id="nombrevalor"  >
                  </div>
                  <div class="col-lg-4">
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
                      <th>Codigo</th>
                      <th>Nombre</th> 
                      <th>Opciones</th>                  
                  </tr>
                  </thead>
                 
                  <tbody id="tableproductos">
                    @foreach($valorcatalogo as $valor)
                    <tr>                 
                        <td>                          
                          <input type="hidden" name="ids[]"  
                          @if($valor->id==0)
                          value="0" 
                          @else 
                          value="{{$valor->id}}" 
                          @endif
                          />
                          <input  type="hidden" name="codigo[]" value="{{$valor->codigo}}" />
                          <input type="hidden" name="nombresvalores[]" value="{{$valor->descripcion}}"  />   
                          {{$valor->  codigo}} </td>
                        <td> {{$valor-> descripcion}} </td>  
                        <td>
                          <button type="button" onclick="eliminar(${codigo})" class="tabledit-edit-button btn btn-sm btn-default" >
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

     
      <br>
      <br>
      
            {{-- <input type="hidden" name="_tocken" value="{{ csrf_tocken() }}">           --}}
            <button type="submit" class="btn btn-sm btn-success" > Guardar catalogo</button>
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
      let codigo = $("#codigo").val();
      let nombrevalor = $("#nombrevalor").val();
      
      console.log(codigo);

      if (nombrevalor.length > 0 ) {
    
          $("#tableproductos").append(`
                  <tr id="tr-${codigo}">
                      <td>
                          <input type="hidden" name="ids[]" value="0" />
                          <input type="hidden" name="codigo[]" value="${codigo}" />
                          <input type="hidden" name="nombresvalores[]" value="${nombrevalor}" />
                          ${codigo}    
                      </td>
                      <td>${nombrevalor}</td>
                      <td>
                        <button type="button" onclick="eliminar(${codigo})" class="tabledit-edit-button btn btn-sm btn-default" >
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