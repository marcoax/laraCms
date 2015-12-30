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
                <div class="col-sm-12 mb0 text-center">{!! $article->description !!}</div>
             </div><!-- /row -->
        </div> <!-- /container -->
    </div>
</section>
@endsection