
@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header ">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">
            <span class="glyphicon glyphicon-book"></span> Editar usuario</h5>          
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
      <form action="{{url('/usuarios/'.$usuario->id)}}" method="POST"> 
          @csrf
          @method('PUT')

          <fieldset class="form-group">
            <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>
            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{$usuario->nombre}}"  required autocomplete="nombre" autofocus>
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
              <option value="{{ $rol -> id }}"
                @if ($rol->id === $usuario->rol_id)
                selected
                @endif> {{$rol -> nombre}} 
               
              </option>
              @endforeach  
            </select>
          </div>


            <fieldset class="form-group">
              <label for="email" class="col-md-4 col-form-label text-md-end">Correo electrónico</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$usuario->email}}" required autocomplete="email">

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </fieldset>
            
            

            <section class="tabs-section">
              <div class="tabs-section-nav tabs-section-nav-icons">
                <div class="tbl">
                  <ul class="nav" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" href="#tabs-1-tab-1" role="tab" data-toggle="tab">
                        <span class="nav-link-in">
                          <i class="fa fa-th-large"></i>
                          Sucursales
                        </span>
                      </a>
                    </li>             
                          
                   
                  </ul>
                </div>
              </div><!--.tabs-section-nav-->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tabs-1-tab-1">            
                
                  <div class="row">
              
                    <div class="col-lg-6">
                      <div class="input-group">  
                        <fieldset class="form-group">
                          <label class="form-label" for="nombresucursal">Sucursal</label>

                          <div class="row">
                            <div class="col-lg-8">
                              <select name="sucursal_id"  id="sucursal_id" class="select2">
                                @foreach ($sucursales as $sucursal)
                                <option value="{{ $sucursal -> id }}"> {{$sucursal -> nombre}} </option>
                                @endforeach  
                              </select>    
                              <br> 
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
                        <table id="table-sucursales" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nombre</th>                                
                                <th>Opciones</th>                  
                            </tr>
                            </thead>
                          
                            <tbody id="tablesucursales">
                
                              @foreach($sucursalusuarios as $susuarios)
                              <tr>                 
                                  <td> 
                                    <input  type="hidden" name="sucursal_id[]" value="{{$susuarios->sucursal_id}}" />                                     
                                    {{$susuarios-> Sucursal -> nombre}} </td>                                 
                                  <td>
                                    <button type="button" onclick="eliminar(${sucursal_id})" class="tabledit-edit-button btn btn-sm btn-default" >
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
                </div><!--.tab-pane-->
               
            </section><!--.tabs-section-->       
          <br>
          <br>

            <button type="submit" class="btn btn-sm btn-success">
              Actualizar usuario
          </button>
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
      let sucursal_id = $("#sucursal_id option:selected").val();
      let sucursal_text = $("#sucursal_id option:selected").text();   
 
      if (sucursal_id > 0 ) {
    
          $("#tablesucursales").append(`
                  <tr id="tr-${sucursal_id}">
                      <td>
                          <input type="hidden" name="sucursal_id[]" value="${sucursal_id}" />
                          ${sucursal_text}    
                      </td>                    
                      <td>
                        <button type="button" onclick="eliminar(${sucursal_id})" class="tabledit-edit-button btn btn-sm btn-default" >
                                        <span class="glyphicon glyphicon-trash"></span>
                                      </button>

                       
                      </td>
                  </tr>

              `);
        
      } else {
          alert("Se debe ingresar una sucursal valido");
      }
    }    
    
    function eliminar(id) {
      $("#tr-" + id).remove();
     
    }    
    </script>



  @endpush

@endsection


