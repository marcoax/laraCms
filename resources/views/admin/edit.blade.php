@extends('admin.master')
@section('title', 'Edit')
@section('content')
	@include('admin.helper.toolbar_top')
<div class="container col-md-8">
	<div class="well well bs-component">

		<form  id="edit_form" class="form-horizontal" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
        	@include('admin.common.error')
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
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
			    {{  AdminForm::get( $article )}}
				@if ( config('admin.list.section.'.strtolower($pageConfig['model']).'s.password')  == 1)
					@include('admin.helper.password')
				@endif
				@include('admin.helper.form_submit_button')

			</fieldset>
		</form>
	</div>
</div>
<div  class="col-sm-4">
	<div class="well well bs-component" id="naviSx" data-spy="affixd" data-offset-top="0">
		@include('admin.helper.side_bar_action')
	</div>
</div><!--/span contenuto  box  dx-->
@endsection