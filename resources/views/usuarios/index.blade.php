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
                            <span class="glyphicon glyphicon-home"></span> Usuarios</h5>
                      </div>
                      <div class="col text-right">
                        <a href="{{url('/usuarios/create')}}" class="btn btn-sm btn-primary edu-btn-yellow " >Nuevo usuario</a>
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
                    <table id="table-empresas" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="1">
                                #
                            </th>
                            <th>Nombre</th>
                            <th>Usuario</th>  
                            <th>Correo</th>    
                            <th>Rol</th>     
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)

                            <tr>
                                <td> {{$usuario-> id}} </td>
                                <td> {{$usuario-> nombre}} </td>
                                <td> {{$usuario-> username}} </td>
                                <td> {{$usuario-> email}} </td> 
                                <td> {{$usuario-> rol->nombre}} </td>
                                <td>
                                    <form action="{{url('/usuarios/'.$usuario->id.'/inactivar')}}" method="POST">
                                      @csrf    
                                      <a href="{{url('/usuarios/'.$usuario->id.'/edit')}}" class="tabledit-edit-button btn btn-sm btn-default">
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


