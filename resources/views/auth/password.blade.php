@extends('website.app')
@section('content')
	@include('website.partials.page_banner')
	<!--=== Content Part ===-->
	<section data-role="info-block">
		<div id="content_section">
			<div class="container">
				<div class="row mb0">
					@include('website.partials.pagetitle')
					<div class="col-sm-12 mb0 text-center">{!! $article->description !!}</div>

				</div><!-- /row -->


				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3>Forgot Password</h3>
							</div>
							<div class="panel-body">
								@include('admin.common.error')
								<form class="form-horizontal" role="form" method="POST" >
									<input type="hidden" name="_token" value="{{ csrf_token() }}">

									<div class="form-group">
										<label class="col-md-4 control-label">E-Mail Address</label>
										<div class="col-md-6">
											<input type="email" class="form-control" name="email" value="{{ old('email') }}">
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-6 col-md-offset-4">
											<button type="submit" class="btn btn-primary">
												{{ trans('message.password_sent_reset_link') }}

											</button>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div> <!-- /container -->
		</div>
	</section>
@endsection
