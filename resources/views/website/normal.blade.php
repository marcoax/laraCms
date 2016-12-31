@extends('website.app')
@section('content')
@include('website.partials.page_banner')
<!--=== Content Part ===-->
@section('content')
    <main>
        <div id="content" class="container">
            <h1 class="page-title mb25">{{ $article->title }}</h1>
            <div class="row">
                <div class="@if( $article->image ) ? col-md-7 @else col-md-12 @endif">
                    {!! $article->description !!}
                </div>
                @if($article->image)
                    <div class="col-md-4">
                        <img src="{!! ImgHelper::get($article->image, config('laraCms.image.medium')) !!}" alt="{{ $article->title }}" border="0" class="img-responsive 100">
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection