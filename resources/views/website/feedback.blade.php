@extends('website.app')
@section('content')
@include('website.partials.page_banner')
        <!--=== Content Part ===-->
<section data-role="info-block">
    <div id="content_section">
        <div class="container">
            <div class="row mb0">
                @include('website.partials.pagetitle')
            </div><!-- /row -->
            <div class="container col-sm-6 col-sm-offset-3  pt15">@include('flash::notification')</div>
        </div> <!-- /container -->
    </div>
</section>
@endsection