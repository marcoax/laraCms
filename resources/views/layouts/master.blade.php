<html>
<head>

    <title>LaraCms - @yield('title')</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content=." />
    <meta name="author" content="marcoasperti@gmail.com" />
    <meta name="google-site-verification" content="" />
    <meta property="og:title" content="laraCms - design studio - Milan Italy" />
    <meta property="og:url" content=/" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="" />
    <!-- Latest compiled and minified CSS -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,300,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{!! asset('public/fe/css/animate.min.css')!!}">
    <link href="{!! asset('public/css/ma_helper.css')!!}" rel="stylesheet">
    <link href="{!! asset('public/fe/css/override.css')!!}" rel="stylesheet">
    <link href="{!! asset('public/fe/css/header_default.css')!!}" rel="stylesheet">
    <link href="{!! asset('public/fe/css/app.css')!!}" rel="stylesheet">
</head>
<body>
    @include('shared.navbar')
    @include('shared.carousel')
    <div class="container">
       @yield('content')
    </div>
    <!--=== Content Part ===-->
    <section data-role="info-block">
        <div id="creolo_section">
            <div class="container">
                <div class="row mb0">
                    <div class="col-sm-12 text-center ">
                        <h1 class="color-4 mv20 wow bounceInRight smally">Design Studio in Milan</h1>
                        <h2 class=" mt5 mb25 text-uppercase color-main wow bounceInLeft">Creolo</h2>
                    </div>
                    <div class="col-sm-6 mb25 text-justify">
                        <p>We are a design studio based in Milan devoted to create impact and value. Since 2001 we take care of all the creative aspects for a client list of individuals, brands, institutions and NGOs.<br />
                            We design everything from businesses to brands to products, from books to bowls to boxes. And a lot more beyond. Our multi-disciplinary experience and expertise covers both brand and product design disciplines so we can help you from initial concept to ultimate expression.&nbsp;<br />
                            As designers we always build from the roots up. Our process is clear and simple: understand and define a clear vision for the project; explore the visual and conceptual roots of the idea; translate these roots into an authentic social and cultural experience.<br />
                            We embrace and provoke new ways of thinking and doing in order to help you navigate through rapidly changing competitive environments, applying maximum creativity together with strategy to make each project a success.<br />
                            Besides studio projects, CREOLO enjoys giving lectures and holding workshops at art &amp; design academies here and there around the globe.</p>

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


    @include('shared.social')
    @section('footer')
        <footer class="bck-color-footer pf15">
            <div class="container">
                <div class="row">
                    <p class="mf0 color-5">&copy;  2015 creolo | design studio | Milan Italy <a href="#" class="color-5">Privacy</a> &middot; <a href="#" class="color-5">Terms</a>
                    </p>
                </div>
            </div>
        </footer>
    @show
</body>
<!-- Latest compiled and minified JavaScript -->
<script src="{!! asset('public/js/jquery-2.1.4.min.js')!!}"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="{!! asset('public/fe/plugins/carousel-swipe.js')!!}"></script>
<script type="text/javascript" src="{!! asset('public/fe/plugins//wow-animations/js/wow.min.js')!!}"></script>
<script type="text/javascript" language="javascript" src="{!! asset('public/fe/plugins/owl-carousel/owl.carousel.min.js')!!}"></script>
<script src="{!! asset('public/fe/js/app.js')!!}"></script>
<script type="text/javascript">

    jQuery(document).ready(function() {
        App.init();
        App.initWoW();
     });


    (function( $ ) {

        //Function to animate slider captions
        function doAnimations( elems ) {
            //Cache the animationend event in a variable
            var animEndEv = 'webkitAnimationEnd animationend';

            elems.each(function () {
                var $this = $(this),
                        $animationType = $this.data('animation');
                $this.addClass($animationType).one(animEndEv, function () {
                    $this.removeClass($animationType);
                });
            });
        }

        //Variables on page load
        var $myCarousel = $('#myCarousel'),
            $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
            //Initialize carousel
             $myCarousel.carousel();

            //Animate captions in first slide on page load
            doAnimations($firstAnimatingElems);

            //Pause carousel
            $myCarousel.carousel('pause');


            //Other slides to be animated on carousel slide event
            $myCarousel.on('slide.bs.carousel', function (e) {
                var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
                doAnimations($animatingElems);
            });

    })(jQuery);
</script>
</html>