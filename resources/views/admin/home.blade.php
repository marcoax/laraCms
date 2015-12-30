@extends('admin.master')

@section('title', 'Admin Control Panel')

@section('content')

    <div class="container">
        <div class="row">
            <div class=" col-xs-6 col-sm-6 col-md-3 col-lg-3 pf5">
                <div class="btn-icon bck-color-2 text-center color-2 transitioned">
                    <a href="{{ URL::to('/admin/list/articles') }}" class="color-2"><i class="fa fa-newspaper-o fa-4x"></i>
                        <h3 class="color-2 mv5">Pages</h3>
                    </a>
                </div>
            </div>
            <div class=" col-xs-6 col-sm-6 col-md-3 col-lg-3 pf5">
                <div class="btn-icon bck-color-2 text-center color-2 transitioned">
                    <a href="{{ URL::to('/admin/list/hpsliders') }}" class="color-2"><i class="fa fa-image fa-4x"></i>
                        <h3 class="color-2 mv5">Hp sliders</h3>
                    </a>
                </div>
            </div>
            <div class=" col-xs-6 col-sm-6 col-md-3 col-lg-3 pf5">
                <div class="btn-icon bck-color-2 text-center color-2 transitioned">
                    <a href="{{ URL::to('/admin/list/news') }}" class="color-2"><i class="fa fa-comment fa-4x"></i>
                        <h3 class="color-2 mv5">News</h3>
                    </a>
                </div>
            </div>
            <div class=" col-xs-6 col-sm-6 col-md-3 col-lg-3 pf5">
                <div class="btn-icon bck-color-2 text-center color-2 transitioned">
                    <a href="{{ URL::to('/admin/list/socials') }}" class="color-2"><i class="fa fa-hand-o-right fa-4x"></i>
                        <h3 class="color-2 mv5">Socialize</h3>
                    </a>
                </div>
            </div>
            <div class=" col-xs-6 col-sm-6 col-md-3 col-lg-3 pf5">
                <div class="btn-icon bck-color-2 text-center color-2 transitioned">
                    <a href="{{ URL::to('/admin/list/users') }}" class="color-2"><i class="fa fa-users fa-4x"></i>
                        <h3 class="color-2 mv5">Users</h3>
                    </a>
                </div>
            </div>
            <div class=" col-xs-6 col-sm-6 col-md-3 col-lg-3 pf5">
                <div class="btn-icon bck-color-2 text-center color-2 transitioned">
                    <a href="{{ URL::to('/admin/list/roles') }}" class="color-2"><i class="fa fa-graduation-cap fa-4x"></i>
                        <h3 class="color-2 mv5">Roles</h3>
                    </a>
                </div>
            </div>

            <div class=" col-xs-6 col-sm-6 col-md-3 col-lg-3 pf5">
                <div class="btn-icon bck-color-4 text-center color-2 transitioned">
                    <a href="{{ URL::to('') }}" class="color-2" target="_new"><i class="fa fa-globe fa-4x"></i>
                        <h3 class="color-2 mv5">Website </h3>
                    </a>
                </div>
            </div>
            <div class=" col-xs-6 col-sm-6 col-md-3 col-lg-3 pf5">
                <div class="btn-icon bck-color-main text-center color-2 transitioned">
                    <a href="" class="color-2"><i class="fa fa-pie-chart fa-4x"></i>
                        <h3 class="color-2 mv5">Stat (cooming soon) </h3>
                    </a>
                </div>
            </div>
         </div>
    </div>

@endsection