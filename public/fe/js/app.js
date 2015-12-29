/**
 * Created by Marco Asperti on 24/12/2015.
 * for laraCms
 */



var App = function () {


    function handleBootstrap() {
        /*Bootstrap Carousel*/
        jQuery('.carousel').carousel({
            interval: 2000,
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

    function handleSearch() {
        jQuery('.search').click(function () {
            if(jQuery('.search-btn').hasClass('fa-search')){
                jQuery('.search-open').fadeIn(500);
                jQuery('.search-btn').removeClass('fa-search');
                jQuery('.search-btn').addClass('fa-times');
            } else {
                jQuery('.search-open').fadeOut(500);
                jQuery('.search-btn').addClass('fa-search');
                jQuery('.search-btn').removeClass('fa-times');
            }
        });
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
                type : 'GET',
                url : urlAjaxHandler+"/validate/newsletter",
                data : {
                    email      : $('#email').val(),
                    Firstname  : $('#nome').val(),
                },
                dataType : 'json',
                success : function(response) {
                    if (response.status) {
                        updateModalAlertMsg(response.msg);
                    }
                    else updateModalAlertMsg(response.msg);
                },
                error : function(response) {
                    updateModalAlertMsg('Sorry! Error');
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

            handleSearch();
            handleToggle();
            handleHeader();
            hideTopBar();
            //niceScroll();
            iscivitiNewsletter();
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

        initCounter: function () {
            jQuery('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        },

        initParallaxBg: function () {
            jQuery('.parallaxBg').parallax("50%", 0.2);
        },
        /*
         initMasorny: function () {
         $containerM = $('#masonryBox');
         $containerM.imagesLoaded( function() {
         $containerM.masonry();
         });
         },
         */
        initIsotope: function () {
            var $container = $('.isotope').isotope({
                itemSelector: '.topa',
                layoutMode: 'masonry'
            });

            setTimeout(function(){
                $container.isotope({
                    filter:  '.product'
                });
            }, 1000);




            // bind filter button click
            $('#filters').on( 'click', 'li > button', function() {
                $("[data-filter='.product'").removeClass('active');
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