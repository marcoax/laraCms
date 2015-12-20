@extends('admin.master')
@section('title', 'Create')
@section('content')
<div class="container col-md-8">
	<div class="well well bs-component">

		<form class="form-horizontal" method="post" accept-charset="UTF-8" enctype="multipart/form-data">

			@include('admin.common.error')
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			<fieldset>
				<legend>
					Create
				</legend>
			    {{  AdminForm::get($article)}}
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