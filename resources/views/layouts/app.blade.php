<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bella studio') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  
    <link href="./css/web/bootstrap.css"  rel="stylesheet">
    <link href="./css/web/educator.css" rel="stylesheet">
    <link href="./css/separate/login-studios.css" rel="stylesheet">
    <link rel="icon" href="./img/web/favicon.ico"type="image/png">

    
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<link rel="stylesheet" href="{{ asset('assets/css/soft-ui-dashboard.min.css') }}"> 

    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    {{-- 
    <script src="{{ asset('assets/js/core/popper.min.js')}}"></script>
	<script src="{{ asset('assets/js/core/bootstrap.min.js')}}"></script>
	<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
	<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
	<script src="{{ asset('assets/js/plugins/dragula/dragula.min.js')}}"></script>
	<script src="{{ asset('assets/js/plugins/jkanban/jkanban.js')}}"></script>
	<script src="https://kit.fontawesome.com/42d5adcbca.js"></script>
	<script src="{{ asset('assets/js/plugins/chartjs.min.js')}}"></script> --}}

</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
