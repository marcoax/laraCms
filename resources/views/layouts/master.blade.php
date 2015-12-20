<html>
    <head>
        <title>App Name - @yield('title')</title>
        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    	<link href="{!! asset('public/css/roboto.min.css') !!}" rel="stylesheet">
    	<link href="{!! asset('public/css/material.min.css') !!}" rel="stylesheet">
    	<link href="{!! asset('public/css/ripples.min.css')!!}" rel="stylesheet">
    </head>
    <body>
    	@include('shared.navbar')
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container-full">
    		
            @yield('content')
        </div>
    </body>
    <!-- Latest compiled and minified JavaScript -->
	<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script src="public/js/ripples.min.js"></script>
	<script src="public/js/material.min.js"></script>
	<script>
	    $(document).ready(function() {
	        // This command is used to initialize some elements and make them work properly
	        $.material.init();
	    });
	</script>
</html>