@extends('layouts.panel')

@section('content')
<div class="row">	  
    
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

             
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="row">
            <div class="col-sm-6">
                <article class="statistic-box red">
                    <div>
                        <div class="number">26</div>
                        <div class="caption"><div>Ordenes de trabajo/ Mes actual</div></div>	                                
                    </div>
                </article>
            </div><!--.col-->
            <div class="col-sm-6">
                <article class="statistic-box yellow">
                    <div>
                        <div class="number">12</div>
                        <div class="caption"><div>Facturas / Mes actual</div></div>
                        
                    </div>
                </article>
            </div><!--.col-->
            <div class="col-sm-6">
                <article class="statistic-box red">
                    <div>
                        <div class="number">104</div>
                        <div class="caption"><div>Cuentas por pagar / Mes actual</div></div>
                        
                    </div>
                </article>
            </div><!--.col-->
            <div class="col-sm-6">
                <article class="statistic-box yellow">
                    <div>
                        <div class="number">29</div>
                        <div class="caption"><div>Cuentas por cobrar / Mes actual</div></div>	                               
                    </div>
                </article>
            </div><!--.col-->
        </div><!--.row-->
    </div><!--.col-->
</div><!--.row-->


@endsection