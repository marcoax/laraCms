<!DOCTYPE html>
<html>
    <head lang="{!! LaravelLocalization::getCurrentLocale() !!}">
        <title>CMS - @yield('title')</title>
        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300"></liink>
		<link rel="stylesheet" href="http://localhost/creolos/admin/assets/css/vendor/uploadifive.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    	<link href="{!! asset('public/css/ma_helper.css')!!}" rel="stylesheet">
		<link href="{!! asset('public/cms/css/bootstrap-theme.css')!!}" rel="stylesheet">
    	<link href="{!! asset('public/cms/css/admin.css')!!}" rel="stylesheet">
    	<script>
			// init  some   global  variable
			var    _SERVER_PATH  = "{!! url('') !!}";
			var    _LOCALE 		 = "{!! LaravelLocalization::getCurrentLocale() !!}";
			var    _CURMODEL 	 = "{!! ( isset($pageConfig['model']) ? $pageConfig['model'] : "" ) !!}";
	    </script>
    </head>
    <body>
	    @include('admin.common.navbar')

        <div class="container-full mt25">
    		@yield('content')
        </div>
    </body>
    <!-- Latest compiled and minified JavaScript -->
  	<script src="{!! asset('public/js/jquery-2.1.4.min.js')!!}"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="{!! asset('public/cms/js/cms.js')!!}"></script>
	<script src="{!! asset('public/js/vendor/notify.min.js')!!}"></script>
	<script src="{!! asset(config('admin.path.plugins').'tinymce/tinymce.min.js')!!}"></script>
	<script src="{!! asset( config('admin.path.js_vendor').'bootbox.js') !!}"></script>
	<script>
	    $(document).ready(function() {
	        // This command is used to initialize some elements and make them work properly
	        Cms.init();
	    });
	</script>
	@yield('footerjs')

</html>