@extends('website.app')
@section('content')
@include('website.partials.page_banner_violet')
<section id="contatti_section" data-role="info-block">
    <div class="relative" style="position:relative">
        <!-- Google Map -->
        <div id="map" class="map" ></div><!---/map-->
        <!-- End Google Map -->
        <div  id="contact-layer" class="container bck-color-7 text-center transitioned" >
            <address id="map-address">

                <h2 class="color-6 mv10">CREOLO DESIGN</h2>
                <h2 class="color-6 mb10" >{!! config('laraCms.website.option.app.address')!!}<br>
                    {!! config('laraCms.website.option.app.locality')!!}</h2>
                <h2 class="color-6 mv10"><a href="mailto:{!! config('laraCms.website.option.app.email')!!}" class="color-2">{!! config('laraCms.website.option.app.email')!!}</a>
                </h2>
                <h2 class="color-6 mv10 ">Tel {!! config('laraCms.website.option.app.phone')!!}</h2>
                <h2 class="color-6 mv10">Fax {!! config('laraCms.website.option.app.fax')!!}</h2>

            </address>

        </div>
        <button class="showMap  btn btn-warning mb10" data-text="SHOW CONTACTS" data-old-text="SHOW MAP" href="#">SHOW MAP</button>
    </div>
</section>
@include('website.form.contact')
@endsection
@section('footerjs')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAp6eZk_5tgJaw4KSfWeP-ibwrHKB7xALk&sensor=false"></script>
    <script type="text/javascript" src="{!! asset( config('laraCms.admin.path.assets').'/website/js/ma_gmaps.js')!!}"></script>
    <!-- JS Page Level -->
    <script type="text/javascript">


        var point;
        var map;
        var gdir;
        var infowindow
        var addressMarker;
        var lat  		='45.504510'
        var long 		='9.176335';
        var id_page		="";
        var geocoder 	= null;
        var Indirizzo   ="<div class='mapPop'><b>CREOLO DESIGN [+]</b><br>via Tartini 10<br> 20158 Milano<br> Italia<br></div>"

        //var Indirizzo_2   ="<div class='mapPop'><b>CREOLO DESIGN [+]</b><br></div>"
        var singlePoint = false; // se true  mette un solo punto sulla mappa
        var mapIcons='http://www.creolo.org/assets/img/pointer.png';
        var zoomLevel = 10

        var sites = [
            ['CREOLO DESIGN',lat,long,1,Indirizzo]
            //['CREOLO DESIGN','43.542592','13.389187',1,Indirizzo_2]
        ];
        jQuery(document).ready(function() {
            App.initMapSwitcher();
            gMap.init();

        });
    </script>
@endsection

