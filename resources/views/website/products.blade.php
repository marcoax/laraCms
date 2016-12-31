@inject('product_category','App\Category')

@extends('website.app')
@section('content')
    @include('website.partials.page_banner_violet')
    <section data-role="info-block">
        <div id="work_section" class="bck-color-6 pv5">
            <div class="container">
                <div class="row mb0">
                    @include('website.partials.pagetitle')
                    <div class="col-sm-12 mb0 text-center">{!! $article->description !!}</div>
                </div><!-- /row -->
            </div> <!-- /container -->
        </div>
    </section>
    <section id="work_menu" data-role="category">
        <div class="bck-color-6 pv5">
            <div class="container content">
                <div class="row">
                    <div class="col-sm-12 text-center ">
                        @include('website.product.category_menu')
                    </div>
                </div><!-- row -->
            </div> <!-- /container -->
        </div>
    </section>
    <section data-role="work-list">
        <div class="pb25  bck-color-6">
            <div class="container content pt25">
                <div class="col-xs-12 mf0 pf0 isotope" id="masonryBox"> @include('website.product.product_list')</div>
            </div>
        </div>
    </section>
@endsection
@section('footerjs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.initIsotope();
     });
    </script>
@endsection


