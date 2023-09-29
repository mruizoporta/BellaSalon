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
        <form action="{{url('/catalogos')}}" method="POST">
          @csrf

          <div class="row">

              <div class="col-lg-8">
                <div class="input-group"> 
                  <fieldset class="form-group">
                      <label class="form-label" for="name"> Nombre </label>
                      <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" require> 
                  </fieldset>
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->

                 
            <div class="col-lg-6">
              <div class="input-group"> 
                <fieldset class="form-group">
                  <label for="lblintereses">Descripcion </label>
                  <textarea rows="5"  name="descripcion"  class="form-control" value="{{old('descripcion')}}"></textarea>                
                </fieldset>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->

          </div>


        <h5 class="m-t-lg with-border">Detalle de valores</h5>

        <div class="row">
         
          <div class="col-lg-12">          
              <div class="form-group">                
                <div class="input-group"> 
                  <fieldset class="form-group">
                      <label class="form-label" for="name"> Codigo </label>
                      <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" require> 
                  </fieldset>
                </div><!-- /input-group -->
              </div>      
          </div><!-- /.col-lg-6 -->
        </div>
  
  
        <div class="row">
           
          <div class="col-lg-6">
            <div class="input-group">  
              <fieldset class="form-group">
                <label class="form-label" for="lblpreciocontado">Cantidad</label>
                <div class="row">
                  <div class="col-lg-6">
                    <input type="number" class="form-control" name="cantidad" id="cantidad"  >
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
                      <th>Codigo</th>
                      <th>Descripcion</th> 
                      <th>Opciones</th>                  
                  </tr>
                  </thead>
                 
                  <tbody id="tableproductos">
      
                  </tbody>
                
              </table>      
          </div> 
          </div>
        </div>

     
      <br>
      <br>
      
            {{-- <input type="hidden" name="_tocken" value="{{ csrf_tocken() }}">           --}}
            <button type="submit" class="btn btn-sm btn-success" > Crear servicio</button>
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
      let cantidad = $("#cantidad").val();
      
      console.log(producto_id);

      if (cantidad > 0 ) {
    
          $("#tableproductos").append(`
                  <tr id="tr-${producto_id}">
                      <td>
                          <input type="hidden" name="producto_id[]" value="${producto_id}" />
                          <input type="hidden" name="cantidades[]" value="${cantidad}" />
                          ${producto_text}    
                      </td>
                      <td>${cantidad}</td>
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