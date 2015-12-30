@extends('admin.master')
@section('title', 'Edit')
@section('content')
	@include('admin.helper.toolbar_top')
	<div class="container col-md-8">
		<div class="well well bs-component">

				{{ Form::model($article,['files' => true,'id'=>'edit_form','class' =>'form-horizontal','accept-charset' => "UTF-8"]) }}
				@include('admin.common.error')

				<fieldset>
					<legend>
						@if( $article->title!='')
							Edit {{ $article->title }}
						@elseif( $article->name!='')
							Edit {{ $article->name }}
						@else
							Create new  {{ $pageConfig['model'] }}
						@endif

					</legend>
					{{-- Form::input('text', 'title') --}}
					{{ AdminForm::get( $article ) }}

					@if ( config('admin.list.section.'.strtolower($pageConfig['model']).'s.password')  == 1)
						@include('admin.helper.password')
					@endif
					@include('admin.helper.form_submit_button')

				</fieldset>
			{{ Form::close() }}
		</div>
	</div>
	<div  class="col-sm-4">
		<div class="well well bs-component" id="naviSx" data-spy="affixd" data-offset-top="0">
			@include('admin.helper.side_bar_action')
		</div>
	</div><!--/span contenuto  box  dx-->
@endsection
@section('footerjs')
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script type="text/javascript">
		var    _CURMODEL  ="{!!  $pageConfig['model'] !!}";
		tinymce.init({
			selector: "textarea.ckeditor",
			plugins: [
				"advlist autolink lists link image charmap print preview anchor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste"
			],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
		});
		$(function() {
			$( ".datepicker" ).datepicker({
				dateFormat: "dd-mm-yy"
			});
		});
	</script>
@endsection