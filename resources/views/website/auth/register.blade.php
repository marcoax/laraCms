@extends('website.app')
@section('content')
    @include('website.partials.page_banner')
    <!--=== Content Part ===-->
    <section data-role="info-block">
        <div class="container mv25 pt25">
            <div class="row mv25">
                @include('website.auth.form.register')
            </div><!-- /row -->
        </div> <!-- /container -->
    </section>
@endsection
