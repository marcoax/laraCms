@inject('pages','App\Article')
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="{!! LaravelLocalization::getCurrentLocale() !!}" lang="{!! LaravelLocalization::getCurrentLocale() !!}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="marcoax" />
    <meta name="google-site-verification" content="" />

    <link rel="image_src" href="{!! asset(config('laraCms.admin.path.assets').'website/images/logo.jpg') !!}"/>
    <!-- Meta SEO -->
    {!! SEO::generate() !!}
    <meta property="og:url" content="{!! rtrim(LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale()), '/') !!}" />
    <!-- ./Meta SEO -->
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <link rel="alternate" hreflang="{{$localeCode}}" href="{{ rtrim(LaravelLocalization::getLocalizedURL($localeCode), '/') }}"/>
    @endforeach

    @if(isset($article) && $article->seo_no_index )
        <meta name="robots" content="noindex">
    @endif
    <link href="{!! LaravelLocalization::getLocalizedURL( LaravelLocalization::getCurrentLocale() )!!}/" rel="canonical" />

    <link rel="icon" href="{!! asset('/favicon.ico') !!}" type="any" sizes="16x16">
        <!-- Latest compiled and minified CSS -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,300,500' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{!! asset(config('laraCms.admin.path.assets').'website/css/animate.min.css')!!}">
    <link rel="stylesheet" href="{!! asset(config('laraCms.admin.path.assets').'website/css/ma_helper.css')!!}">
    <link rel="stylesheet" href="{!! asset(config('laraCms.admin.path.assets').'website/css/main.css')!!}">
    <link rel="stylesheet" href="{!! asset(config('laraCms.admin.path.assets').'website/css/lib/maCookieEu.css')!!}">

    <!-- Owl Carousel Assets -->
    <link href="{!! asset(config('laraCms.admin.path.assets').'website/plugins/owl-carousel/owl.carousel.css')!!}" rel="stylesheet">
    <link href="{!! asset(config('laraCms.admin.path.assets').'website/plugins/owl-carousel/owl.theme.default.css')!!}" rel="stylesheet">
    <!-- Color box -->
    <link href="{!! asset(config('laraCms.admin.path.assets').'website/plugins/colorbox/colorbox.css')!!}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- GA -->
    @include('website.partials.widgets_ga')
</head>
<body>
    @include('website.partials.navbar')
    @yield('content')
        <div class="bck-color-main">
            <div class="container bck-color-main">
                <div class="row">
                    <div class=" col-sm-12 col-xs-12 col-md-6 pt20" id="foot-dx-bottom">
                        @include('website.partials.widgets_newsletter')
                    </div>
                    <div class=" col-sm-12 col-xs-12 col-md-6 pt5" id="foot-dx-bottom">
                        @include('website.partials.social')
                    </div>
                </div>
            </div>
        </div>
    @section('footer')
        <footer class="bck-color-footer pf15">
            <div class="container">
                <div class="row">
                    <div  class="mf0 color-5">
                        <strong>{!! config('laraCms.website.option.app.name')!!}</strong>
                        {!! config('laraCms.website.option.app.address')!!}- {!! config('laraCms.website.option.app.locality')!!} | T. {!! config('laraCms.website.option.app.phone')!!} - F. {!! config('laraCms.website.option.app.fax') !!} -
                        <a class="color-5" href="mailto:{!! config('laraCms.website.option.app.email') !!}">{!! config('laraCms.website.option.app.email') !!}</a>
                    </div>
                    <div  class="mf0 color-5">
                        Copyright © <?php echo date('Y'); ?> {!! config('laraCms.website.option.app.name')!!} | P.IVA {!! config('laraCms.website.option.app.vat')!!} | All Rights Reserved. |
                        <a class="color-5" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( 'privacy' )) }}">{{ trans('website.privacy')}}</a> |
                        <a class="color-5" href="{{ Setting::getOption('credits_url') }}" target="_blank">Credits</a>
                    </div>
                </div>
            </div>
        </footer>
    @show

{{-- default js to show in all pages --}}
<script type="text/javascript">
    var urlAjaxHandler  = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( '' )) }}";
    var _LANG           = "{{ LaravelLocalization::getCurrentLocale()}} ";
    var _WEBSITE_NAME	= "{!! config('laraCms.website.option.app.name')!!}";
    var imageScroll     = "http://www.creolo.org/assets/img/up.png";
</script>


<!-- Latest compiled and minified JavaScript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="http://www.creolo.org/languages/localize.it.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="{!! asset(config('laraCms.admin.path.assets').'/website/plugins/carousel-swipe.js')!!}"></script>
<script type="text/javascript" src="{!! asset(config('laraCms.admin.path.assets').'/website/plugins//wow-animations/js/wow.min.js')!!}"></script>
<script type="text/javascript" src="{!! asset(config('laraCms.admin.path.assets').'/website/plugins/owl-carousel/owl.carousel.min.js')!!}"></script>
<script type="text/javascript" src="{!! asset(config('laraCms.admin.path.assets').'/website/plugins/colorbox/jquery.colorbox.js')!!}"></script>
<script type="text/javascript" src="{!! asset( config('laraCms.admin.path.js_vendor').'bootbox.js') !!}"></script>
<script type="text/javascript" src="{!! asset( config('laraCms.admin.path.assets').'/website/js/app.js')!!}"></script>
    <!-- JS Implementing Plugins -->
    <script type="text/javascript" src="{!! asset(config('laraCms.admin.path.assets').'/website/plugins/back-to-top.js')!!}"></script>

@yield('footerjs')
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initWoW();
        App.iniServiceOwl();
        App.initTouchBTSlider('#myCarousel');
        App.initColorBox()
    });
</script>
@include('website.partials.widgets_cookie')
</body>
</html>