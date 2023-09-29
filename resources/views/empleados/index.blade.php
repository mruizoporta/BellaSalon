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
                            <span class="glyphicon glyphicon-user"></span> Empleados</h5>
                      </div>
                      <div class="col text-right">
                        <a href="{{url('/empleados/create')}}" class="btn btn-sm btn-primary edu-btn-yellow " >Nuevo empleado</a>
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
                        
                        <table id="table-proveedores" class="table table-bordered table-hover" >
                            <thead>
                            <tr>
                                <th width="1">
                                    #
                                </th>                                               
                                <th>Identificacion</th>  
                                <th>Nombre completo</th>    
                                <th>Correo electrónico</th>                            
                                <th>Telefono</th>                      
                                <th></th>
                                
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($empleados as $empleado)

                                <tr>
                                    <td> {{$empleado-> id}} </td>                  
                                    <td> {{$empleado-> Persona->identificacion}} </td>              
                                    <td> {{$empleado-> Persona->nombres}}  {{$empleado-> Persona->apellidos}}  </td>                                   
                                    <td> {{$empleado-> Persona->correo}} </td> 
                                    <td> {{$empleado-> Persona->telefono}} </td>                           
                                    <td>
                                        <form action="{{url('/empleados/'.$empleado->id.'/inactivar')}}" method="POST">
                                          @csrf    
                                          <a href="{{url('/empleados/'.$empleado->id.'/edit')}}" class="tabledit-edit-button btn btn-sm btn-default">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                          </a>
                                        
                                          <button type="submit" class="tabledit-edit-button btn btn-sm btn-default">
                                            <span class="glyphicon glyphicon-trash"></span>
                                          </button>

                                        </form>
                                      
                                      </td>
                                 </tr>

                                </tr>
                                @endforeach
                                
                            </tbody>

                          
                        </table>     
                    
                  </div>
                </div>
            </div>
        </div>
    </div>

    
</div>



@endsection


