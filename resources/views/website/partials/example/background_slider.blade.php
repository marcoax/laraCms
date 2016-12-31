@inject('hpslider','App\HpSlider')
<!-- Background  slider  ================================================== -->
<section id="home_section" class="section">
    <div id="intro" class="carousel" data-ride="carousel">
        <div class="carousel-inner" role="listbox">

            @foreach (  $hpslider->orderBy('sort', 'ASC')->active()->get() as  $index => $slider )
                <div class="item vh88 @if ($index == 0) active  @endif wow animated fadeIn"
                     style="background-image: url('{!!  ma_get_image_from_repository($slider->image) !!}');"></div>
            @endforeach
        </div>
    </div>
</section>

<!--=== Background  slider ===-->
