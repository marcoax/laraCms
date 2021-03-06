/**
 * Created by Marco Asperti for laraCms on 24/12/2015.
 * for laraCms
 */

var App = function () {


    function handleBootstrap() {
        /*Bootstrap Carousel*/
        jQuery('.carousel').carousel({
            interval: 5000,
            pause: 'hover'
        });

        /*Tooltips*/

        jQuery('.tooltips').tooltip();
        jQuery('.tooltips-show').tooltip('show');
        jQuery('.tooltips-hide').tooltip('hide');
        jQuery('.tooltips-toggle').tooltip('toggle');
        jQuery('.tooltips-destroy').tooltip('destroy');

        /*Popovers*/
        jQuery('.popovers').popover();
        jQuery('.popovers-show').popover('show');
        jQuery('.popovers-hide').popover('hide');
        jQuery('.popovers-toggle').popover('toggle');
        jQuery('.popovers-destroy').popover('destroy');
    }



    function handleToggle() {
        jQuery('.list-toggle').on('click', function() {
            jQuery(this).toggleClass('active');
        });
    }

    function handleHeader() {
        jQuery(window).scroll(function() {
            if (jQuery(window).scrollTop()>100){
                jQuery(".header-fixed .header").addClass("header-fixed-shrink");
            }
            else {
                jQuery(".header-fixed .header").removeClass("header-fixed-shrink");
            }
        });
    }

    function hideTopBar() {
        jQuery(window).on("scroll", function() {

            if ($(document).scrollTop() > 100) {
                //$(".topbar").slideUp();
                $("#main-navi").addClass("bottomonly-shadow");
                $("#logo-colore").show();
                $("#logo-bianco").hide();
            } else {
                //$(".topbar").slideDown();
                setTimeout(function(){
                    $("#main-navi").removeClass("bottomonly-shadow");
                    $("#logo-colore").hide();
                    $("#logo-bianco").show();
                },50);

            }
        });
    }
    //Hover Selector
    function handleHoverSelector() {
        $('.hoverSelector').on('hover', function(e) {
            $('.hoverSelectorBlock', this).toggleClass('show');
            e.stopPropagation();
        });
    }



    function iscivitiNewsletter() {
        var msg = '';
        jQuery('#btn-newsletter-subscribe').click(function(){

            //showWait();
            $.ajax({
                type : 'POST',
                url : urlAjaxHandler+"/api/newsletter",
                data : $( "#form-newsletter" ).serialize(),
                dataType : 'json',
                success : function(response) {
                    var msgHtml = '';
                    if (response.status=='ok') {
                        msgHtml += '<h4>' + response.msg + '</h4>';
                    }
                    else   {
                       $.each( response.errors , function( key, value ) {
                            msgHtml += '<h4>' + value[0] + '</h4>'; //showing only the first error.
                        });

                    };
                    updateModalAlertMsg(msgHtml);

                },
                error : function(response) {
                    updateModalAlertMsg('Error');
                }
            });
        });

    }

    function  niceScroll(){

        // Nice scroll to DIVs
        $('#menu.navbar-nav li a').click(function(evt){
            evt.preventDefault();
            $('.navbar-nav li').removeClass('active')
            var place = $(this).attr('href');
            $(this).parent().addClass('active');
            $('html, body').animate({
                scrollTop: $(place).offset().top-100
            }, 1200, 'swing');
        });
    }



    return {
        init: function () {
            handleBootstrap();
            handleToggle();
            handleHeader();
            hideTopBar();
            //niceScroll();
            iscivitiNewsletter();
        },
        iniServiceOwl: function () {
            var Serviziowl = $('.servizi-carousel');
            Serviziowl.owlCarousel({
                loop : true,
                margin : 25,
                nav : false,
                //navText : [&#x27;<&#x27;,&#x27;>&#x27;]
                responsive : {
                    0 : { items :1
                    },
                    600 : { items :2
                    },
                    1000 : { items :3
                    }
                }
            });


            $('.customNextBtnServizi').click(function() {
                Serviziowl.trigger('next.owl.carousel');
            })
            // Go to the previous item
            $('.customPrevBtnServizi').click(function() {
                Serviziowl.trigger('prev.owl.carousel', [300]);
            })

        },
        initMapSwitcher: function () {
            // Nice scroll to DIVs
            $('.showMap').click(function(evt){
                evt.preventDefault();
                $('#map-address').fadeToggle( "slow", "linear" );
                $('#contact-layer').fadeToggle(  "slow", "linear" );

                var text    = $(this).text();
                var newText = $(this).data('text');
                var oldText = $(this).data('old-text')
                $(this).text(text ==  newText ? oldText : newText   );
            })

        },
        initFancybox: function () {



            jQuery(".fancybox-button").fancybox({
                groupAttr: 'data-rel',
                prevEffect: 'none',
                nextEffect: 'none',
                closeBtn: true,
                helpers: {
                    title: {
                        type: 'inside'
                    }
                }
            });

            jQuery(".iframe").fancybox({
                maxWidth    : 800,
                maxHeight   : 600,
                fitToView   : false,
                width       : '70%',
                height      : '70%',
                autoSize    : false,
                closeClick  : false,
                openEffect  : 'none',
                closeEffect : 'none'
            });
        },


        initColorBox: function () {

            $(".lightbox").colorbox({
                rel: '.lightbox',
                maxHeight:'90%',
                maxWidth:'95%',
                width:'550px',
                height:'550px'
            });
        },



        initIsotope: function () {
            var $container = $('.isotope').isotope({
                itemSelector: '.topa',
                layoutMode: 'masonry'
            });
            /*
            setTimeout(function(){
                $container.isotope({
                    filter:  '.product'
                });
            }, 1000);
            */

            // bind filter button click
            $('#filters').on( 'click', 'li > button', function() {
                $("[data-filter='*']").removeClass('active');
                var filterValue = $( this ).attr('data-filter');
                $container.isotope({ filter: filterValue });
            });
        },

         initWoW: function () {
            new WOW().init({
                mobile:       false,       // default
                live:         true        // default
            });
        },

        initTouchBTSlider: function (objectTarget) {
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
            var $myCarousel = $(objectTarget),
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
        },

    };

}();


function scrollToAnchor(aid){
    window.location.hash = '#'+aid;
}

/******************************** MODAL ************************/


function updateModalAlertMsg($htmlContent) {
    bootbox.alert($htmlContent, function(result) {
        if (result === false) {

        } else {

        }
    });
}

function showWait() {
    updateModalAlertMsg ('.....Attendere prego.....')
}

function updateModalBoxMsg($htmlContent) {
    bootbox.confirm($htmlContent, function(result) {
        if (result === false) {

        } else {

        }
    });
}

/*********************************  localize *********************/

function t(str) {
    if (localized[str].length>0) {
        return localized[str];
    } else {
        return str;
    }
}