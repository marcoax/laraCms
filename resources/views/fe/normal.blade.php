@extends('fe.app')
@section('title', 'Home page')

@section('content')
@include('fe.shared.carousel')
        <!--=== Content Part ===-->
<section data-role="info-block">
    <div id="creolo_section">
        <div class="container">
            <div class="row mb0">
                <div class="col-sm-12 text-center ">
                    <h1 class="color-4 mv20 wow bounceInRight smally">{{ $article->subtitle }}</h1>
                    <h2 class=" mt5 mb25 text-uppercase color-main wow bounceInLeft">{{ $article->title }}</h2>
                </div>
                <div class="col-sm-6 mb25 text-justify">
                    <p>{!! $article->description !!}</p>
                </div>
                <div class="col-sm-6  mb25 text-justify">
                    <p>{!! $article->abstract !!}</p>
                </div>
            </div><!-- /row -->
        </div> <!-- /container -->
    </div>
</section>
@endsection