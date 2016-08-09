@extends('website.app')
@section('content')
    @include('website.partials.page_banner')
    <!--=== Content Part ===-->
    <section data-role="info-block">
        <div id="creolo_section">
            <div class="container">
                <div class="row mb0">
                    @include('website.partials.pagetitle')
                    <div class="col-sm-12 mb0 text-center">{!! $article->description !!}</div>
                </div><!-- /row -->
            </div> <!-- /container -->
        </div>
    </section>
@endsection