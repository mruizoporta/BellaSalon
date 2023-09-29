<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Bella studio</title>

	<link href="{{ asset('img/favicon.png') }}" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="{{ asset('img/favicon.png') }}" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="{{ asset('img/favicon.png') }}" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="{{ asset('img/favicon.png') }}" rel="apple-touch-icon" type="image/png">
	<link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">
	<link href="{{ asset('img/favicon.ico') }}" rel="shortcut icon">
	
	{{-- 
    <link rel="stylesheet" href="{{ asset('css/lib/lobipanel/lobipanel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/separate/vendor/lobipanel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/jqueryui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/separate/pages/widgets.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/font-awesome/font-awesome.min.css') }}">
   
    
		
	<link rel="stylesheet" href="{{ asset('css/separate/vendor/tags_editor.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/separate/vendor/bootstrap-select/bootstrap-select.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/separate/vendor/select2.min.css') }}">  
	
	<link rel="stylesheet" href="{{ asset('css/lib/summernote/summernote.css')}}">
	<link rel="stylesheet" href="{{ asset('css/separate/pages/editor.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/lib/font-awesome/font-awesome.min.css')}}">
	<link href="{{ asset('css/bootstrap-datetimepicker.min.css" rel="stylesheet')}}">
	<link rel="stylesheet" href="{{ asset('css/lib/bootstrap/bootstrap.min.css') }}"> --}}

	<link rel="stylesheet" href="{{ asset('css/separate/vendor/tags_editor.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/separate/vendor/bootstrap-select/bootstrap-select.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/separate/vendor/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/bootstrap/bootstrap.min.css') }}">  
	<link rel="stylesheet" href="{{ asset('css/separate/main.css') }}">
	
	<link rel="stylesheet" href="{{ asset('css/separate/vendor/bootstrap-datetimepicker.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/separate/vendor/bootstrap-daterangepicker.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/lib/clockpicker/bootstrap-clockpicker.min.css') }}">


	{{-- <link rel="stylesheet" href="css/separate/vendor/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="css/lib/fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" href="css/separate/pages/calendar.min.css"> --}}

</head>
<body class="with-side-menu control-panel control-panel-compact">

	<header class="site-header">
	    <div class="container-fluid">

			<button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
	            <span>toggle menu</span>
	        </button>
	
	        <button class="hamburger hamburger--htla">
	            <span>toggle menu</span>
	        </button>
	        <a href="#" class="site-logo">
	            <img class="logo-per" src="{{ asset('img/Logo.png') }}" alt="">	            
	        </a>

	        <div class="site-header-content">
	            <div class="site-header-content-in">
	                <div class="site-header-shown">	                                 
	
	                 	
						@include('includes.userOptions')	
	                 
	                </div><!--.site-header-shown-->
	
	                <div class="mobile-menu-right-overlay"></div>
	               
	            </div><!--site-header-content-in-->
	        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->
	</header><!--.site-header-->

	@include('includes.menu')

	<div class="page-content">
	    <div class="container-fluid">
	       @yield('content')	       
	    </div><!--.container-fluid-->
	</div><!--.page-content-->


	<script src="{{ asset('js/lib/jquery/jquery.min.js')}}"></script>
	<script src="{{ asset('js/lib/tether/tether.min.js')}}"></script>
	<script src="{{ asset('js/lib/bootstrap/bootstrap.min.js')}}"></script>
	<script src="{{ asset('js/plugins.js')}}"></script>

	<script src="{{ asset('js/lib/jquery-tag-editor/jquery.caret.min.js')}}"></script>
    <script src="{{ asset('js/lib/jquery-tag-editor/jquery.tag-editor.min.js')}}"></script>
	<script src="{{ asset('js/lib/peity/jquery.peity.min.js') }}"></script>
	<script src="{{ asset('js/lib/table-edit/jquery.tabledit.min.js') }}"></script>
	<script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
	<script src="{{ asset('js/lib/select2/select2.full.min.js ')}}"></script>
{{-- 
	<script type="text/javascript" src="{{ asset('js/lib/jqueryui/jquery-ui.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/lib/lobipanel/lobipanel.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/lib/match-height/jquery.matchHeight.min.js')}}"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	

	<script src="{{ asset('js/lib/peity/jquery.peity.min.js') }}"></script>
	<script src="{{ asset('js/lib/table-edit/jquery.tabledit.min.js') }}"></script>

	<script src="{{ asset('js/lib/jquery-tag-editor/jquery.caret.min.js')}}"></script>
    <script src="{{ asset('js/lib/jquery-tag-editor/jquery.tag-editor.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('js/lib/select2/select2.full.min.js')}}"></script> --}}

	@stack('scrips')
	<script src="{{ asset('js/app.js')}}"></script>
	<script src="{{ asset('js/lib/input-mask/jquery.mask.min.js')}}"></script>
	<script src="{{ asset('js/lib/input-mask/input-mask-init.js')}}"></script>
	

	
{{-- 
	<script>
		$(function() {
			function cb(start, end) {
				$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			}
			cb(moment().subtract(29, 'days'), moment());

			$('#daterange').daterangepicker({
				"timePicker": true,
				ranges: {
					'Today': [moment(), moment()],
					'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days': [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month': [moment().startOf('month'), moment().endOf('month')],
					'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				},
				"linkedCalendars": false,
				"autoUpdateInput": false,
				"alwaysShowCalendars": true,
				"showWeekNumbers": true,
				"showDropdowns": true,
				"showISOWeekNumbers": true
			});

			$('#daterange2').daterangepicker();

			$('#daterange3').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true
			});

			$('#daterange').on('show.daterangepicker', function(ev, picker) {
				/*$('.daterangepicker select').selectpicker({
					size: 10
				});*/
			});

			/* ==========================================================================
			 Datepicker
			 ========================================================================== */

			$('.datetimepicker-1').datetimepicker({
				widgetPositioning: {
					horizontal: 'right'
				},
				debug: false
			});

			$('.datetimepicker-2').datetimepicker({
				widgetPositioning: {
					horizontal: 'right'
				},
				format: 'LT',
				debug: false
			});
		});
	</script> --}}

</body>
</html>