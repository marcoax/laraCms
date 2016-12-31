@extends('website.app')
@section('content')

<main>
	<div class="container" id="content">

		@if( $product->image )
			<img src="{!! ImgHelper::get_cached($product->image, array('w' => 800, 'h' => 600, 'c' => 'best')) !!}" alt="{!! $product->title !!}" class="img-responsive">
		@endif

		<h1>{!! $product->title !!}</h1>
		{!! $product->description !!}

	</div>
</main>

@endsection
@section('footerjs')
	<script type="text/javascript">

	</script>
@endsection
