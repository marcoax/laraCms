@extends('website.app')
@section('content')
@include('website.partials.page_banner')
        <!--=== Content Part ===-->
<section data-role="info-block">
    <div id="content_section">
        <div class="container">
            <div class="row mb0">
                @include('website.partials.pagetitle')
                <div class="col-sm-12 mb0 text-center">{!! $article->description !!}</div>
             </div><!-- /row -->
        </div> <!-- /container -->
    </div>
</section>
<section data-role="flext-block">
    <div class="container">
        <div class="row row-flex row-flex-wrap">
            <div class="col-md-6">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/iEuDtCeu4nw" allowfullscreen=""></iframe>
                </div>
            </div>
            <div class=" mt25-max-sm col-md-6" style="background-color: #00AA00">

                <div class="flex-col">
                    <div class="flex-grow">
                        <div>
                            <h2 class="mb25 text-uppercase color-main">carpenteria Ducom</h2>
                            <h5 class="color-3 text-uppercase "><b>La Storia:</b></h5>
                            <p>A Niardo dal 1990 passione, esperienza, creatività. Con fuoco e ferro e quei valori culturali ereditati dagli antichi camuni.</p>

                        </div>
                    </div>
                    <div >
                        <a class="btn btn-default pull-right" href="http://localhost/segnonew/26-carpenteria-ducom">Vedi Scheda <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>


            </div>
        </div>
    </div><!--/container-->
</section>
@endsection