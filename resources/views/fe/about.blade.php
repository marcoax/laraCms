@extends('fe.app')
@section('title', $article->title)
@section('content')
@include('fe.partials.page_banner')
        <!--=== Content Part ===-->
<section data-role="info-block">
    <div id="creolo_section">
        <div class="container">
            <div class="row mb0">
                @include('fe.partials.pagetitle')
                <div class="col-sm-6 mb25 text-justify">{!! $article->description !!}</div>
                <div class="col-sm-6  mb25 text-justify">{!! $article->abstract !!}</div>
            </div><!-- /row -->
        </div> <!-- /container -->
    </div>
</section>
@endsection