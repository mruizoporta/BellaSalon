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
                            <span class="glyphicon glyphicon-home"></span> Entradas a inventario</h5>
                      </div>
                      <div class="col text-right">
                        <a href="{{url('/entradas/create')}}" class="btn btn-sm btn-primary edu-btn-yellow " >Nueva entrada</a>
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
                            <th>Fecha</th>  
                            <th>Proveedor</th>    
                            <th>Factura</th>  
                            <th>Total</th>     
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($entradas as $entrada)

                            <tr>
                                <td> {{$entrada-> id}} </td> 
                                <td> {{$entrada-> fechaentrada}} </td>
                                <td> {{$entrada-> Proveedor-> Persona->razonsocial}} </td>  
                                <td> {{$entrada-> numerofactura}} </td>
                                <td> {{number_format($entrada-> total,2)}} </td>  
                                <td>
                                    <form action="{{url('/entradas/'.$entrada->id.'/inactivar')}}" method="POST">
                                      @csrf    
                                      <a href="{{url('/entradas/'.$entrada->id.'/edit')}}" class="tabledit-edit-button btn btn-sm btn-default">
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


