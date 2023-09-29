@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header ">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">
            <span class="glyphicon glyphicon-book"></span> Nuevo producto</h5>          
        </div>
        <div class="col text-right">
          <a href="{{url('/productos')}}" class="btn btn-sm btn-default">Regresar
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
      <form action="{{url('/productos/'.$producto->id)}}" method="POST"> 
        @csrf
        @method('PUT')

          <div class="row">
       
              <div class="col-lg-12">
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
                  <label class="form-label" for="name"> Codigo </label>
                  <input type="text" name="codigo" class="form-control" value="{{$producto->codigo}}" require> 
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
                        @endif
                      > {{$categoria -> nombre}} </option>
                    @endforeach  
                  </select>
                </div>         
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
          </div>

          <div class="row">        

            <div class="col-lg-6">
              <div class="input-group">  
                <div class="form-group">                
                  <label class="form-label" for="nombremarca">Marca</label>                
                  <select class="form-control" name="marca_id">
                    <option value=""> --Seleccione la marca--</option>
                    @foreach ($marcas as $marca)
                    <option value="{{ $marca -> id }}"
                      @if ($marca->id === $producto->marca_id)
                      selected
                      @endif
                      > {{$marca -> nombre}} </option>
                    @endforeach  
                  </select>
                </div>                     
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->

          <div class="col-lg-6">
            <div class="input-group">  
              <div class="form-group">                
                <label class="form-label" for="nombremedida">Unidad de medida</label>                
                <select class="form-control" name="medida_id">
                  <option value=""> --Seleccione la unidad de medida--</option>
                  @foreach ($medidas as $medida)
                  <option value="{{ $medida -> id }}"
                    @if ($medida->id === $producto->medida_id)
                    selected
                    @endif
                    > {{$medida -> nombre}} </option>
                  @endforeach  
                </select>
              </div>     
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->

      </div>  

          <div class="row">           

          <div class="col-lg-6">
            <div class="input-group">  
              <div class="form-group"> 
                <fieldset class="form-group">
                  <label class="form-label" for="lblcostopromedio">Costo</label>             
                  <input type="number" name="costopromedio" class="form-control" value="{{$producto->costopromedio}}" require> 
                </fieldset>               
              </div>         
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->

          <div class="col-lg-6">
            <div class="input-group">  
                <fieldset class="form-group">
                  <label class="form-label" for="lblpreciocredito">Precio credito</label>             
                  <input type="number" name="preciocredito" class="form-control" value="{{$producto->preciocredito}}" require>
                </fieldset>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->

        </div> 

        <div class="row">
         
          <div class="col-lg-6">
            <div class="input-group">  
              <fieldset class="form-group">
                <label class="form-label" for="lblpreciocontado">Precio contado</label>
                <input type="number" class="form-control" name="preciocontado"  value="{{$producto->preciocontado}}">
              </fieldset>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->

          <div class="col-lg-6">
            <div class="input-group">  
              <fieldset class="form-group">
                <label for="lblmargenutilidadcredito"> Margen utilidad credito </label>
                <input type="text" name="margenutilidadcredito" class="form-control"  value="{{$producto->margenutilidadcredito}}">
              </fieldset>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
        </div> 
       
        <div class="row">         

          <div class="col-lg-6">
            <div class="input-group">  
              <fieldset class="form-group">
                <label for="lblmargenutilidadcontado"> Margen utilidad contado </label>
                <input type="text" name="margenutilidadcontado" class="form-control"  value="{{$producto->margenutilidadcontado}}">
              </fieldset>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->

          <div class="col-lg-6">
            <div class="input-group">  
              <fieldset class="form-group">
                <label for="cantidadminima"> Cantidad minima </label>
                <input type="text" name="cantidadminima" class="form-control"  value="{{$producto->cantidadminima}}">
              </fieldset>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </div> 


            <button type="submit" class="btn btn-sm btn-success" > Guardar producto</button>
            <br>
            <br>
            <h5 class="m-t-lg with-border">Existencia</h5>

            <div class="table-responsive">
              <table id="table-productos" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                      <th width="1">
                          #
                      </th>
                      <th>Almacen</th>
                      <th>Existencia</th>                     
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($bodegaproductos as $bodegaproducto)
                      <tr>
                          <td> {{$bodegaproducto-> id}} </td>  
                          <td> {{$bodegaproducto-> Almacen -> nombre}} </td>
                          <td> {{$bodegaproducto-> existencia}} </td>  
                         
                      </tr>
                      @endforeach
                      
                  </tbody>
              </table>      
          </div>

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


