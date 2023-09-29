@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header ">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">
            <span class="glyphicon glyphicon-book"></span> Editar servicio</h5>          
        </div>
        <div class="col text-right">
          <a href="{{url('/servicios')}}" class="btn btn-sm btn-default">Regresar
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
      <form action="{{url('/servicios/'.$producto->id)}}" method="POST"> 
        @csrf
        @method('PUT')

          <div class="row">
            <div class="col-lg-4">
              <div class="input-group"> 
                <fieldset class="form-group">
                  <label class="form-label" for="name"> Codigo </label>
                  <input type="text" name="codigo" class="form-control" value="{{$producto->codigo}}"  disabled> 
                </fieldset>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->

              <div class="col-lg-8">
                <div class="input-group"> 
                  <fieldset class="form-group">
                      <label class="form-label" for="name"> Nombre </label>
                      <input type="text" name="nombre" class="form-control" value="{{$producto->nombre}}" require> 
                  </fieldset>
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->
          </div>

          <div class="row">
            
            <div class="col-lg-6">
              <div class="input-group"> 
                <fieldset class="form-group">
                  <label for="lblintereses">Descripcion </label>
                  <textarea rows="5"  name="descripcion"  class="form-control">{{$producto->descripcion}}</textarea>                
                </fieldset>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->

            <div class="col-lg-6">
              <div class="input-group">  
                <div class="form-group">                
                  <label class="form-label" for="nombrecategoria">Categorias</label>                
                  <select class="form-control" name="categoria_id">
                    <option value=""> --Seleccione la categoria--</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria -> id }}"
                      @if ($categoria->id === $producto->categoria_id)
                      selected
                      @endif> {{$categoria -> descripcion}} </option>
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
                  <label for="lblmargenutilidadcredito"> Margen utilidad </label>
                  <input type="text" name="margenutilidad" class="form-control"  value="{{$producto->margenutilidad}}" >
                </fieldset>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->

            <div class="col-lg-6">
              <div class="input-group"> 
                <fieldset class="form-group">
                  <label class="form-label" for="lblpreciocredito">Precio 1</label>             
                  <input type="number" id="precio1" name="precio1" onchange="calcularmargen()" class="form-control" value="{{$producto->precio1}}" require>
                </fieldset>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </div> 

        <div class="row">
          <div class="col-lg-6">
            <div class="input-group"> 
              <fieldset class="form-group">
                <label class="form-label" for="lblpreciocredito">Precio 2</label>             
                <input type="number" name="precio2" class="form-control" value="{{$producto->precio2}}" require>
              </fieldset>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
     
            <div class="col-lg-6">
              <div class="input-group"> 
                <fieldset class="form-group">
                  <label class="form-label" for="lblpreciocredito">Precio 3</label>             
                  <input type="number" name="precio3" class="form-control" value="{{$producto->precio3}}" require>
                </fieldset>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </div>

        <h5 class="m-t-lg with-border">Información adicional</h5>


        <section class="tabs-section">
          <div class="tabs-section-nav tabs-section-nav-icons">
            <div class="tbl">
              <ul class="nav" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" href="#tabs-1-tab-1" role="tab" data-toggle="tab">
                    <span class="nav-link-in">
                      <i class="fa fa-th-large"></i>
                      Productos
                    </span>
                  </a>
                </li>             
                <li class="nav-item">
                  <a class="nav-link" href="#tabs-1-tab-3" role="tab" data-toggle="tab">
                    <span class="nav-link-in">
                      <i class="fa fa-archive"></i>
                      Ofertas
                    </span>
                  </a>
                </li>                    
               
              </ul>
            </div>
          </div><!--.tabs-section-nav-->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="tabs-1-tab-1">
                
            <div class="row">
            
              <div class="col-lg-12">
                <div class="input-group">  
                  <div class="form-group">                
                    <label class="form-label" for="nombreproducto">Producto</label>   

                    <select name="producto_id"  id="producto_id" class="select2">
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
                          <th>Nombre</th>
                          <th>Cantidad</th> 
                          <th>Opciones</th>                  
                      </tr>
                      </thead>
                    
                      <tbody id="tableproductos">
          
                        @foreach($servicioproducto as $sproducto)
                        <tr>                 
                            <td> 
                              <input  type="hidden" name="producto_id[]" value="{{$sproducto->producto_id}}" />
                              <input type="hidden" name="cantidades[]" value="{{$sproducto->producto_id}}"  />   
                              {{$sproducto-> Producto -> nombre}} </td>
                            <td> {{$sproducto-> cantidad}} </td>  
                            <td>
                              <button type="button" onclick="eliminar(${producto_id})" class="tabledit-edit-button btn btn-sm btn-default" >
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


            <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-3">
              
              <div class="col text-right">
                <a href="{{url('/productos/create')}}" class="tabledit-edit-button btn btn-sm btn-default" 
                   data-toggle="modal"
                   data-target="#myModal">
                  <span class="glyphicon glyphicon-plus"></span>
                </a>
              </div> 
              <br>               
                <div class="table-responsive">
                <table id="table-ofertas" class="table table-bordered table-hover">
                    <thead>
                    <tr>                            
                        <th>Cantidad</th>
                        <th>Cantidad gratis </th>  
                        <th>Precio </th>  
                        <th>Fecha inicio </th>  
                        <th>Fecha fin </th>                    
                    </tr>
                    </thead>
                    <tbody>                        
                        @foreach($productoofertas as $oferta)
                        <tr>                               
                            <td> {{$oferta-> cantidad}} </td>
                            <td> {{$oferta-> regalo}} </td>  
                            <td> {{$oferta-> precio}} </td>  
                            <td> {{$oferta-> fechainicio}} </td>  
                            <td> {{$oferta-> fechafin}} </td>  
                            <td>
                              <button type="button" onclick="eliminar(${oferta_id})" class="tabledit-edit-button btn btn-sm btn-default" >
                                              <span class="glyphicon glyphicon-trash"></span>
                                            </button>                         
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>      
              </div>  
          <form action="{{url('/productos/'.$producto->id.'/oferta')}}" method="POST"> 
          @csrf
          @method('PUT')   
           <div class="modal fade"
              id="myModal"
              tabindex="-1"
              role="dialog"
              aria-labelledby="myModalLabel"
              aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                        <i class="font-icon-close-2"></i>
                      </button>
                      <h4 class="modal-title" id="myModalLabel">Nueva oferta</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="input-group"> 
                            <fieldset class="form-group">
                              <label class="form-label" for="lblcantidadoferta">Cantidad</label>             
                              <input type="number" id="cantidad" name="cantidad" class="form-control" value="0.0" require>                            
                            </fieldset>
                          </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                  
                          <div class="col-lg-6">
                            <div class="input-group"> 
                              <fieldset class="form-group">
                                <label for="lblcantidadgratisoferta"> Cantidad gratis  </label>
                                <input type="text"  id="regalo" name="regalo" class="form-control"  value="0.0">
                              </fieldset>
                            </div><!-- /input-group -->
                          </div><!-- /.col-lg-6 -->
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="input-group"> 
                            <fieldset class="form-group">
                              <label class="form-label" for="lblpreciooferta">Precio</label>             
                              <input type="number" id="precio" name="precio" class="form-control"  value="0.0" require>                            
                            </fieldset>
                          </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->     
                      </div>

                      <div class="row">
                        <div class="col-lg-6">   
                            <label class="form-label" for="lblfechainicio">Fecha Inicio</label> 
                            <div class='input-group date datetimepicker'>                                
                              <input id="daterange3" type="text" id ="fechainicio" name ="fechainicio" class="form-control">
                              <span class="input-group-addon">
                                <i class="font-icon font-icon-calend"></i>
                              </span>
                            </div>
                        </div><!-- /.col-lg-6 -->
                  
                          <div class="col-lg-6">
                            <label class="form-label" for="lblfechafin">Fecha Fin</label> 
                            <div class='input-group date datetimepicker'>                                
                              <input id="daterange3" type="text" id ="fechafin" name ="fechafin" class="form-control">
                              <span class="input-group-addon">
                                <i class="font-icon font-icon-calend"></i>
                              </span>
                            </div>
                      </div>
                    </div>
                    <br>
                    <div class="modal-footer">                       
                      <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-rounded btn-primary">Guardar cambios</button>
                    </div>
                  </div>
                </div>
              </div><!--.modal-->      
          </form>  
            </div><!--.tab-pane-->             
          </div><!--.tab-content-->
        </section><!--.tabs-section-->   
     
      <br>
      <br>
      
            {{-- <input type="hidden" name="_tocken" value="{{ csrf_tocken() }}">           --}}
            <button type="submit" class="btn btn-sm btn-success" > Guardar servicio</button>
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

