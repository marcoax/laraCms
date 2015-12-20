@extends('admin.master')

@section('title', 'Create A New Role')

@section('content')
<div class="container col-md-8 col-md-offset-2">
	<div class="well well bs-component">

		<form class="form-horizontal" method="post">

			@foreach ($errors->all() as $error)
			<p class="alert alert-danger">
				{{ $error }}
			</p>
			@endforeach

			@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
			@endif

			<input type="hidden" name="_token" value="{!! csrf_token() !!}">

			<fieldset>
				<legend>
					Create a new role
				</legend>
					<div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="display_name" class="col-lg-2 control-label">Display Name</label>
                        <div class="col-lg-10">
                            <input type="display_name" class="form-control" id="display_name" name="display_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" id="description" name="description"></textarea>
                        </div>
                    </div>

				@include('admin.helper.form_submit_button')
			</fieldset>
		</form>
	</div>
</div>
@endsection