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
                            <span class="glyphicon glyphicon-home"></span> Almacenes</h5>
                      </div>
                      <div class="col text-right">
                        <a href="{{url('/almacenes/create')}}" class="btn btn-sm btn-primary edu-btn-yellow " >Nueva almacen</a>
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
                    <table id="table-sucursales" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="1">
                                #
                            </th>
                            <th>Empresa</th>
                            <th>Nombre</th>                              
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($almacenes as $almacen)

                            <tr>
                                <td> {{$almacen-> id}} </td>
                                <td> {{$almacen-> empresa -> nombre}} </td>
                                <td> {{$almacen-> nombre}} </td>                               
                                <td>
                                    <form action="{{url('/almacenes/'.$almacen->id.'/inactivar')}}" method="POST">
                                      @csrf    
                                      <a href="{{url('/almacenes/'.$almacen->id.'/edit')}}" class="tabledit-edit-button btn btn-sm btn-default">
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


