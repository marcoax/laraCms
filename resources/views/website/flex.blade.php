@extends('website.app')

@section('content')
    @include('website.partials.page_banner')
    <!--=== Content Part ===-->
    <div class="container mv25"><h3>row-flex (make columns equal heights in each row)</h3></div>
    <div class="container">
        <div class="row row-flex row-flex-wrap">
            <div class="col-md-3">
                <div class="panel panel-default flex-col">
                    <div class="panel-heading">Title flex-col</div>
                    <div class="panel-body flex-grow">Content here -- div with .flex-grow</div>
                    <div class="panel-footer">Footer</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="well">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                </div>
            </div>
            <div class="col-md-3">
                <div class="well">
                    Duis pharetra varius quam sit amet vulputate.
                </div>
            </div>
            <div class="col-md-3">
                <div class="well">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet
                    vulputate.
                    Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
                    dolor, in sagittis nisi.
                </div>
            </div>
        </div><!--/row-->
    </div><!--/container-->
    <div class="container mv15 pb25 ">
        <div class="row">
            <div class="col-md-12 mb25">

                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.

            </div>
        </div>
        <div class="row row-flex row-flex-wrap">
            <div class="col-md-6 mt15-max-sm">

                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/iEuDtCeu4nw" allowfullscreen=""></iframe>
                </div>

            </div>
            <div class=" mt25-max-sm col-md-6"  >
                <div class="flex-col">
                    <div class="flex-grow">
                        <div>
                            <h2 class="mb15 text-uppercase color-main">carpenteria Ducom</h2>
                            <h5 class="color-3 text-uppercase "><b>La Storia:</b></h5>
                            <p>A Niardo dal 1990 passione, esperienza, creatività. Con fuoco e ferro e quei valori culturali ereditati dagli antichi camuni.</p>
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-default active pull-right" href="#&quot;">Vedi Scheda <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>


            </div>

        </div><!--/row-->
    </div><!--/container--
@endsection