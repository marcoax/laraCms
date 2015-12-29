@extends('fe.app')
@section('title', 'Home page')

@section('content')
@include('fe.shared.carousel')
<section data-role="info-block">
    <div id="creolo_section">
        <div class="container">
            <div class="row mb0">
                <div class="col-sm-12 text-center ">
                    <h1 class="color-4 mv20 wow bounceInRight smally">{{ $article->title }}</h1>
                    <h2 class=" mt5 mb25 text-uppercase color-main wow bounceInLeft">{{ $article->title }}</h2>
                </div>
                <div class="col-sm-6 mb25 text-justify">
                    <p>{!! $article->description !!}</p>

                    <p>&nbsp;</p>				</div>
                <div class="col-sm-6  mb25 text-justify">
                    <p>We offer services in:&nbsp;<br />
                        - trend analysis and researches for new scenarios and concepts&#39; development;&nbsp;<br />
                        - product and industrial design;&nbsp;<br />
                        - workshop for product, process and service innovation and training for capacity building;&nbsp;<br />
                        - strategic design and total branding projects;&nbsp;<br />
                        - design management and design consulting for new&nbsp;creative industries&nbsp;and&nbsp;start-ups;&nbsp;<br />
                        - marketing strategies and integrated communication plans;&nbsp;<br />
                        - art-direction and graphics BTL&nbsp;(corporate identity, catalogues, pubblications);&nbsp;<br />
                        - adv campaigns and photo shooting services;&nbsp;<br />
                        - web-design;&nbsp;<br />
                        - web and&nbsp;social marketing;&nbsp;<br />
                        - retail design, info-graphics and tools for retail communication;&nbsp;<br />
                        - packaging, labelling and commercial illustrations/graphics;&nbsp;<br />
                        - promotional installations and fair booth design;&nbsp;<br />
                        - conception, coordination, management of events and exhibitions.</p>
                </div>
            </div><!-- /row -->
        </div> <!-- /container -->
    </div>
</section>
@endsection
@section('footerjs')
@endsection

