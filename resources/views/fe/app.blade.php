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
    @include('fe.shared.navbar')
    @yield('content')
    @include('fe.shared.social')
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
@yield('footerjs')
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