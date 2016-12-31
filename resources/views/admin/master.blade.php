<!DOCTYPE html>
<html>
    <head lang="{!! LaravelLocalization::getCurrentLocale() !!}">
        <title>{!! config('laraCms.admin.option.title') !!}</title>
        <!-- Latest compiled and minified CSS -->


		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300"/>
		<link rel="stylesheet" href="{!! asset(config('laraCms.admin.path.plugins').'uploadifive/uploadifive.css')!!}">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="{!! asset(config('laraCms.admin.path.plugins').'select2/css/select2.min.css') !!}">
		<link rel="stylesheet" href="{!! asset(config('laraCms.admin.path.plugins').'custom-scrollbar/jquery.mCustomScrollbar.min.css')!!}" />
    	<link href="{!! asset('css/ma_helper.css')!!}" rel="stylesheet">
		<link href="{!! asset('cms/css/bootstrap-theme.css')!!}" rel="stylesheet">
    	<link href="{!! asset('cms/css/admin.css')!!}" rel="stylesheet">
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
  	<script src="{!! asset('js/jquery-2.1.4.min.js')!!}"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="{!! asset(config('laraCms.admin.path.plugins').'custom-scrollbar/jquery.mCustomScrollbar.concat.min.js')!!}"></script>
	<script src="{!! asset('cms/js/cms.js')!!}"></script>
	<script src="{!! asset('js/vendor/notify.min.js')!!}"></script>
	<script src="{!! asset(config('laraCms.admin.path.plugins').'tinymce/tinymce.min.js')!!}"></script>
	<script src="{!! asset( config('laraCms.admin.path.js_vendor').'bootbox.js') !!}"></script>
	<script>
	    $(document).ready(function() {
	        // This command is used to initialize some elements and make them work properly
	        Cms.init();
	    });
	</script>
	@yield('footerjs')
</html>
