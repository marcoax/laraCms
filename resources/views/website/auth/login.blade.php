@extends('website.app')
@section('content')
	@include('website.partials.page_banner')
	<!--=== Content Part ===-->
	<section data-role="info-block">
		<div id="content_section">
			<div class="container">
				<div class="row mv25">
					@include('website.partials.pagetitle')
					<div class="col-sm-12 mb0 text-center">{!! $article->description !!}</div>
					@include('website.auth.form.login')
				</div><!-- /row -->

			</div> <!-- /container -->
		</div>
	</section>
@endsection