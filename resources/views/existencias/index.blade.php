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
                            <span class="glyphicon glyphicon-home"></span> Existencia de productos</h5>
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
                    <table id="table-productos" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="1">
                                #
                            </th>
                            <th>Almacen</th>
                            <th>Producto</th>                             
                            <th>Marca</th>  
                            <th>Existencia</th>  
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($bodegaproductos as $bodegaproducto)

                            <tr>
                                <td> {{$bodegaproducto-> id}} </td>                              
                                <td> {{$bodegaproducto-> almacen->nombre}} </td>
                                <td> {{$bodegaproducto-> producto->nombre}} </td>
                                <td> {{$bodegaproducto-> producto->marca->nombre}} </td>
                                <td> {{$bodegaproducto-> existencia}} </td>                               
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


