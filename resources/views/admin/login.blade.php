@extends('admin.master')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6  col-lg-6  col-md-offset-2">
			<div class="pf15 center-block text-center">
				<img src="{!! asset('/cms/image/logo_cms_hp.png')!!}" alt="CMS Login">
			</div>
			<div class="panel panel-default">
				<div class="bck-color-6 text-center center-block pf5">
					<h3 class="text-center color-6">{!! config('laraCms.admin.option.title') !!}</h3>
				</div>
				<div class="panel-body mt25">
					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoopsss! </strong> There were some problems with your input.

						<ul class="mt25">
							@foreach ($errors->all() as $error)
							<li>
								{{ $error }}
							</li>
							@endforeach
						</ul>
					</div>
					@endif

					<form class="form-horizontal" method="post">
		                {!! csrf_field() !!}

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address </label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Password </label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" value="">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember">
										@lang('message.remember_me')
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary btn-block mb15" style="margin-right: 15px;">
									Login
								</button>
								<a href="{{ URL::to('/admin/password/reset/') }}">@lang('message.password_forgot')</a>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection