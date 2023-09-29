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
                  <span class="glyphicon glyphicon-user"></span>   Gestionar horario</h5>
            </div>  
            <div class="col text-right">
              <button type="submit" class="btn btn-sm btn-success">Guardar cambios</button>
            </div>        
          </div>

        </div>
    </div>

    <form action="{{url('/horario')}}" method="POST">
        @csrf
            <div class="card shadow">

                <div class="card-body">
                  @if(session('notification'))
                  <div class="alert alert-success" role="alert">
                    {{session('notification')}}
                  </div>
                  @endif

                  @if(session('errors'))
                  <div class="alert alert-danger" role="alert">
                  Los cambios se han guardado, pero se encontraron las siguientes novedades:
                  <ul>
                    @foreach(session('errors') as $error)
                    <li> {{$error}}</li>
                    @endforeach
                  </ul> 
                  {{session('notification')}}
                  </div>
                  @endif
                  <br>
                  <div class="input-group">  
                    <div class="form-group">              
                                   
                      <select class="form-control" name="cargo_id">
                        <option value=""> --Seleccione el empleado--</option>
                        @foreach ($empleados as $empleado)
                        <option value="{{ $empleado -> id }}"> {{$empleado -> nombres}}  {{$empleado -> apellidos}} </option>
                        @endforeach  
                      </select>
                    </div>     
                  </div>   
                </div>
                <br>
                <div class="table-responsive">
                  <div class="bootstrap-table">
                  <!-- Projects table -->
                  <table id="table-horarios" class="table table-bordered table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Dia</th>
                        <th scope="col">Activo</th>
                        <th scope="col">Turno manana</th>
                        <th scope="col">Turno tarde</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($horarios as $key => $horario)
                    <tr>
                        <th>{{$days[$key]}}</th>
                        <td>                        

                        <div class="checkbox-toggle">
                          <input type="checkbox" id="active" name="active[]" value="{{$key}}"  @if ($horario->active) checked @endif/>
                          <label for="active"></label>
                        </div>  
                        </td>
                        <td>
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="input-group">  
                                  <div class="form-group">
                                      <select class="form-control" name="morning_start[]">
                                          @for($i=8; $i<=11; $i++)
                                          <option value="{{ ($i<10 ? '0' : '') .$i }}:00 "
                                          @if($i. ':00 AM' == $horario->morning_start) selected @endif>{{ $i }}:00 AM</option>                                        
                                          {{ $i }}:00 AM</option>
                                          @endfor
                                      </select>
                                </div>
                              </div>
                            </div>
                                <div class="col-lg-6">
                                  <div class="input-group">  
                                    <div class="form-group">
                                        <select class="form-control" name="morning_end[]">
                                            @for($i=8; $i<=11; $i++)
                                            <option value="{{ ($i<10 ? '0' : '') .$i }}:00 "
                                            @if($i. ':00 AM' == $horario->morning_end) selected @endif>{{ $i }}:00 AM</option>
                                            
                                            @endfor
                                        </select>
                                      </div>
                                    </div>
                                  </div>        
                               
                            </div>
                        </td>
                        <td>
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="input-group">  
                                  <div class="form-group">
                                      <select class="form-control" name="afternoon_start[]">
                                          @for($i=2; $i<=6; $i++)
                                          <option value="{{ $i+12 }}:00"
                                          @if($i. ':00 PM' == $horario->afternoon_start) selected @endif>{{ $i }}:00 PM</option>                                        
                                          @endfor
                                      </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="input-group">  
                                  <div class="form-group">
                                    <select class="form-control" name="afternoon_end[]">
                                         @for($i=2; $i<=6; $i++)
                                         <option value="{{ $i+12 }}:00"
                                         @if($i. ':00 PM' == $horario->afternoon_end) selected @endif>{{ $i }}:00 PM</option>
                                         @endfor
                                    </select>
                                  </div>
                                </div>
                              </div>     
                            </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              </div>
    </form>
  </div> 
</div>  
</div>     
@endsection