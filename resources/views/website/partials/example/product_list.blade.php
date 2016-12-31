@extends('website.app')
@section('content')
	<main>
		<div id="content" class="container start-content">
			<h1 class="page-title mb25">{{ $article->title }}</h1>
			<div class="row row-list text-center">
				@foreach( $products as $product )
				<div class="col-md-3 col-sm-6 mb25">
					<a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( '/products/'.$product->id.'-'.$product->slug )) }}">
						<img src="{!! ImgHelper::get($product->image, config('laraCms.image.defaults')) !!}" alt="{{ $product->title }}" border="0" class="img-responsive 100">
						<p>{{ $product->title }}</p>
						<p>{{ $product->subtitle }}</p>
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</main>
@endsection