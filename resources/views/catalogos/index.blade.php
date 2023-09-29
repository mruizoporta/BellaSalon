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
                            <span class="glyphicon glyphicon-lock"></span> Catalogos</h5>
                      </div>
                      <div class="col text-right">
                        <a href="{{url('/catalogos/create')}}" class="btn btn-sm btn-primary edu-btn-yellow " >Nuevo catalogo</a>
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
                    <table id="table-cargos" class="table table-bordered table-hover">
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
                            @foreach($catalogos as $catalogo)

                            <tr>
                                <td> {{$catalogo-> id}} </td>
                                <td> {{$catalogo-> nombre}} </td>
                                <td>
                                  <form action="{{url('/catalogos/'.$catalogo->id.'/inactivar')}}" method="POST">
                                      @csrf 
                                      <a href="{{url('/catalogos/'.$catalogo->id.'/edit')}}" class="tabledit-edit-button btn btn-sm btn-default">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                      </a>

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
