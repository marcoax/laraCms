@inject('pages','App\Article')
@extends('website.app')
@section('content')
@include('website.partials.carousel')
<!--=== Content Part infoblock ===-->
<section data-role="info-block">
    <div id="home_section">
        <div class="container">
            <div class="row mb0">
                <div class="col-sm-12 text-center ">
                    <h1 class="color-4 mv20 wow bounceInRight smally">{!! $article->subtitle !!}</h1>
                    <h2 class=" mt5 mb25 text-uppercase color-main wow bounceInLeft">{!! $article->title !!}</h2>
                </div>
                @include('website.partials.pagecontent',['page' => $pages->where('slug','=','about')->first()])
            </div><!-- /row -->
        </div> <!-- /container -->
    </div>
</section>
@include('website.partials.servicecarousel',['services' => $pages->where('slug','=','service')->first()])
@endsection