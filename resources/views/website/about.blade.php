@extends('website.app')
@section('content')
@include('website.partials.page_banner')
<!--=== Content Part ===-->
<section data-role="info-block">
    <div id="content_section">
        <div class="container">
            <div class="row mb0">
                @include('website.partials.pagetitle')
                <div class="col-sm-6 mb25 text-justify">{!! $article->description !!}</div>
                <div class="col-sm-6  mb25 text-justify">{!! $article->abstract !!}</div>
                @include('website.partials.widgets_page_share')
            </div><!-- /row -->
        </div> <!-- /container -->
    </div>
</section>
@endsection