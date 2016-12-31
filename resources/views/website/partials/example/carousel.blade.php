@inject('hpslider','App\HpSlider')
<!-- Carousel  ================================================== -->
<!--=== Slider ===-->
<section id="home_slider_section" class="section">
    <!-- Carousel ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
           @foreach (  $hpslider->active()->get() as  $index => $slider )
                <div class="item   @if ($index == 0) active"  @endif">
                    <img src="{!!  ma_get_image_from_repository($slider->image) !!}" alt="" class="fw">
                    <div class="container">
                        <div class="carousel-caption full-screen">
                            <p class="lead" data-animation="animated bounceInDown">{{ $slider->description }}</p>
                            <h2 data-animation="animated bounceInUp">{{ $slider->title }}</h2>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>
    </div><!-- /.carousel -->
</section>
<!--=== End Slider ===-->
