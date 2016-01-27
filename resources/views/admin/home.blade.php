@extends('admin.master')
@section('title', 'Admin Control Panel')
@section('content')

    <div class="container">
        <div class="row">
            <div class=" col-xs-6 col-sm-6 col-md-3 col-lg-3 pf5">
                <div class="btn-icon bck-color-4 text-center color-2 transitioned">
                    <a href="{{ URL::to('') }}" class="color-2" target="_new"><i class="fa fa-globe fa-4x"></i>
                        <h3 class="color-2 mv5">Website </h3>
                    </a>
                </div>
            </div>
            @foreach(config('laraCms.admin.list.section') as $section)
                @if ( isset($section['menu']['home']) )
                <div class=" col-xs-6 col-sm-6 col-md-3 col-lg-3 pf5">
                    <div class="btn-icon bck-color-2 text-center color-2 transitioned">
                        <a href="{{ ma_get_admin_list_url($section['model']) }}" class="color-2"><i class="fa fa-{{ $section['icon'] }} fa-4x"></i>
                            <h3 class="color-2 mv5">{{ $section['title'] }}</h3>
                        </a>
                    </div>
                </div>
                @endif
            @endforeach

            @if (Auth::user()->hasRole('su'))
                <div class=" col-xs-6 col-sm-6 col-md-3 col-lg-3 pf5">
                    <div class="btn-icon bck-color-2 text-center color-2 transitioned">
                        <a href="{{ ma_get_admin_list_url('roles') }}" class="color-2"><i class="fa fa-graduation-cap fa-4x"></i>
                            <h3 class="color-2 mv5">Roles</h3>
                        </a>
                    </div>
                </div>
            @endif



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