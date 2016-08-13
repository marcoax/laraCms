@extends('website.app')
@section('content')
    @include('website.partials.page_banner')
    <!--=== Content Part ===-->
    <section data-role="info-block">
        <div id="content_section">
            <div class="container pt25">
                <div class="row mv25 pv25">
                   @include('website.auth.form.password')
                </div><!-- /row -->
            </div> <!-- /container -->
        </div>
    </section>
@endsection