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
        <form action="{{url('/productos')}}" method="POST">
          @csrf

          <div class="row">
            <div class="col-lg-4">
              <div class="input-group"> 
                <fieldset class="form-group">
                  <label class="form-label" for="name"> Codigo </label>
                  <input type="text" name="codigo" class="form-control"  value="{{old('codigo')}}" disabled> 
                </fieldset>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
       
              <div class="col-lg-8">
                <div class="input-group"> 
                  <fieldset class="form-group">
                      <label class="form-label" for="name"> Nombre </label>
                      <input type="text" name="nombre" class="form-control"  value="{{old('nombre')}}" require> 
                  </fieldset>
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->
          </div>

          <div class="row">  
            <div class="col-lg-6">
              <div class="input-group"> 
                <fieldset class="form-group">
                  <label for="lbldescripcion">Descripcion </label>
                  <textarea rows="5"  name="descripcion" value="{{old('descripcion')}}" class="form-control"></textarea>                
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
                    <option value="{{ $categoria -> id }}"> {{$categoria -> descripcion}} </option>
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
                  <label class="form-label" for="nombremarca">Marca</label>                
                  <select class="form-control" name="marca_id">
                    <option value=""> --Seleccione la marca--</option>
                    @foreach ($marcas as $marca)
                    <option value="{{ $marca -> id }}"> {{$marca -> descripcion}} </option>
                    @endforeach  
                </select>
                </fieldset>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
       
              <div class="col-lg-6">
                <div class="input-group"> 
                  <fieldset class="form-group">
                    <label class="form-label" for="nombrmedida">Unidad de medida</label> 
                    <select class="form-control" name="medida_id">
                      <option value=""> --Seleccione la unidad de medida--</option>
                      @foreach ($medidas as $medida)
                      <option value="{{ $medida -> id }}"> {{$medida -> descripcion}} </option>
                      @endforeach  
                    </select>
                  </fieldset>
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="input-group"> 
                <fieldset class="form-group">
                  <label class="form-label" for="lblcostopromedio">Costo</label>             
                  <input type="number" name="costopromedio" class="form-control" value="{{old('costopromedio')}}" require>                            
                </fieldset>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
       
              <div class="col-lg-6">
                <div class="input-group"> 
                  <fieldset class="form-group">
                    <label for="lblmargenutilidadcredito"> Margen utilidad  </label>
                    <input type="text" name="margenutilidad" class="form-control"   value="{{old('margenutilidad')}}" >
                  </fieldset>
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="input-group"> 
                <fieldset class="form-group">
                  <label for="cantidadminima"> Cantidad minima </label>
                  <input type="text" name="cantidadminima" class="form-control"  value="{{old('cantidadminima')}}" >
                </fieldset>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
       
              <div class="col-lg-6">
                <div class="input-group"> 
                  <fieldset class="form-group">
                    <label class="form-label" for="lblpreciocredito">Precio 1</label>             
                    <input type="number" name="precio1" class="form-control" value="{{old('precio1')}}" require>
                  </fieldset>
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="input-group"> 
                <fieldset class="form-group">
                  <label class="form-label" for="lblpreciocredito">Precio 2</label>             
                  <input type="number" name="precio2" class="form-control" value="{{old('precio2')}}" require>
                </fieldset>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
       
              <div class="col-lg-6">
                <div class="input-group"> 
                  <fieldset class="form-group">
                    <label class="form-label" for="lblpreciocredito">Precio 3</label>             
                    <input type="number" name="precio3" class="form-control" value="{{old('precio3')}}"  require>
                  </fieldset>
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->
          </div>         
      
            <button type="submit" class="btn btn-sm btn-success" > Crear producto</button>
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


