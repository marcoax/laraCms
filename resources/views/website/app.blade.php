@inject('pages','App\Article')
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="{!! LaravelLocalization::getCurrentLocale() !!}" lang="{!! LaravelLocalization::getCurrentLocale() !!}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="marcoax" />
    <meta name="google-site-verification" content="" />
    <!-- Meta SEO -->
    {!! SEO::generate() !!}
    <meta property="og:url" content="{!!LaravelLocalization::getLocalizedURL( LaravelLocalization::getCurrentLocale() )!!}/" />
    <!-- ./Meta SEO -->
    <link rel="image_src" href="{!! asset('public/website/images/logo.jpg') !!}"/>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
         <link rel="alternate" hreflang="{{$localeCode}}" href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}/"/>
    @endforeach
    <link href="{!! LaravelLocalization::getLocalizedURL( LaravelLocalization::getCurrentLocale() )!!}/" rel="canonical" />

    <!-- Latest compiled and minified CSS -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,300,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{!! asset('public/website/css/animate.min.css')!!}">
    <link href="{!! asset('public/css/ma_helper.css')!!}" rel="stylesheet">
    <link href="{!! asset('public/website/css/override.css')!!}" rel="stylesheet">
    <link href="{!! asset('public/website/css/header_default.css')!!}" rel="stylesheet">
    <link href="{!! asset('public/website/css/app.css')!!}" rel="stylesheet">

    <!-- Owl Carousel Assets -->
    <link href="{!! asset('public/website/plugins/owl-carousel/owl.carousel.css')!!}" rel="stylesheet">
    <link href="{!! asset('public/website/plugins/owl-carousel/owl.theme.default.css')!!}" rel="stylesheet">
</head>
<body>
    @include('website.partials.navbar')
    @yield('content')
    @include('website.partials.social')
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
{{-- default js to show in all pages --}}
<!-- Latest compiled and minified JavaScript -->
<script src="{!! asset('public/js/jquery-2.1.4.min.js')!!}"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="{!! asset('public/website/plugins/carousel-swipe.js')!!}"></script>
<script type="text/javascript" src="{!! asset('public/website/plugins//wow-animations/js/wow.min.js')!!}"></script>
<script type="text/javascript" language="javascript" src="{!! asset('public/website/plugins/owl-carousel/owl.carousel.min.js')!!}"></script>
<script src="{!! asset('public/website/js/app.js')!!}"></script>
@yield('footerjs')
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initWoW();
        App.iniServiceOwl();
        App.initTouchBTSlider('#myCarousel');

    });
</script>
</html>