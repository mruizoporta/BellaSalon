@extends('layouts.panel')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row align-items-center">
                      <div class="col">                        
                        <h5 class="mb-0">
                            <span class="glyphicon glyphicon-home"></span> Productos</h5>
                      </div>
                      <div class="col text-right">
                        <a href="{{url('/productos/create')}}" class="btn btn-sm btn-primary edu-btn-yellow " >Nuevo producto</a>
                      </div>
                    </div>
                  </div>
            </div>
                <div class="card-body">
                    @if(session('notification'))
                    <div class="alert alert-success" role="alert">
                      {{session('notification')}}
                    </div>
                    @endif
                </div>
                  <div class="table-responsive">
                    <div class="bootstrap-table">
                      <div class="fixed-table-toolbar">
                        <div class="pull-left search">
                          <form action="">
                            <div class="form-row">
                              <input type="text" class="form-control" placeholder="Buscar..." name="texto" value={{$texto}}>
                            </div>
                          </form>
                        </div>
                      </div>

                    <table id="table-productos" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="1">
                                #
                            </th>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Categoria</th>  
                            <th>Marca</th>  
                            <th>Precio</th>     
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)

                            <tr>
                                <td> {{$producto-> id}} </td>                              
                                <td> {{$producto-> codigo}} </td>
                                <td> {{$producto-> nombre}} </td>
                                <td> {{$producto-> categoria}} </td>
                                <td> {{$producto-> marca }} </td>
                                <td> {{$producto-> precio}} </td>  
                                <td>
                                    <form action="{{url('/productos/'.$producto->id.'/inactivar')}}" method="POST">
                                      @csrf    
                                      <a href="{{url('/productos/'.$producto->id.'/edit')}}" class="tabledit-edit-button btn btn-sm btn-default">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                      </a>
                                     
                                      <button type="submit" class="tabledit-edit-button btn btn-sm btn-default">
                                        <span class="glyphicon glyphicon-trash"></span>
                                      </button>

                                    </form>
                                   
                                  </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>      
                </div>
            </div>
        </div>
    </div>

    
</div>


@endsection


