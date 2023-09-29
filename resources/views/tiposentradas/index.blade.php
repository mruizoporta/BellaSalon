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
                            <span class="glyphicon glyphicon-tasks"></span> Tipos de entradas</h5>
                      </div>
                      <div class="col text-right">
                        <a href="{{url('/tiposentradas/create')}}" class="btn btn-sm btn-primary edu-btn-yellow " >Nueva tipo de entrada</a>
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
                    <table id="table-modalidades" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="1">
                                #
                            </th>
                            <th>Nombre </th>                           
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tiposentrada as $tipoentrada)

                            <tr>
                                <td> {{$tipoentrada-> id}} </td>
                                <td> {{$tipoentrada-> nombre}} </td>                               
                                <td>
                                  <form action="{{url('/tiposentradas/'.$tipoentrada->id.'/inactivar')}}" method="POST">
                                      @csrf                                       
                                      <a href="{{url('/tiposentradas/'.$tipoentrada->id.'/edit')}}" class="tabledit-edit-button btn btn-sm btn-default">
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

@section('scripts')
<script 
    src="{{ asset('js/per/categorias.js')}}">
</script>
@endsection
