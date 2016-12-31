<nav class="navbar navbar-inverse navbar-fixed-top bottomonly-shadow">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"
               href="http://www.gfstudio.com" target="_new">
                <img src="{!! asset('cms/image/logo.png')!!}" alt="CMS Login" style="margin-top:2px;height:45px;">
            </a>
        </div>

        @if($view_name!='admin-login')

        <!-- Navbar Right -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                 @if (Auth::guard('admin')->check())

                    @if (Auth::guard('admin')->user()->hasRole('su'))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tools
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown">
                                    <a href="{{ ma_get_admin_list_url('adminusers') }}"><i class="fa fa-fw fa-list"></i> Admin</a>
                                </li>
                                <li>
                                    <a href="{{  ma_get_admin_create_url('adminusers') }}"><i class="fa fa-fw fa-plus"></i> Add Admin</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ ma_get_admin_list_url('domains') }}"><i class="fa fa-fw fa-list"></i> Domains</a>
                                </li>
                                <li>
                                    <a href="{{ ma_get_admin_create_url('domains') }}"><i class="fa fa-fw fa-plus"></i> Add Domains</a>
                                </li>

                                <li>
                                    <a href="{{ ma_get_admin_list_url('countries') }}"><i class="fa fa-fw fa-list"></i> Countries</a>
                                </li>
                                <li>
                                    <a href="{{ ma_get_admin_create_url('countries') }}"><i class="fa fa-fw fa-plus"></i> Add Country</a>
                                </li>
                                <li>
                                    <a href="{{ ma_get_admin_list_url('settings') }}"><i class="fa fa-fw fa-list"></i> Settings</a>
                                </li>
                                <li>
                                    <a href="{{ ma_get_admin_create_url('settings') }}"><i class="fa fa-fw fa-plus"></i> Add Setting</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ ma_get_admin_list_url('roles') }}"><i class="fa fa-fw fa-list"></i> Roles</a>
                                </li>
                                <li>
                                    <a href="{{ ma_get_admin_create_url('roles') }}"><i class="fa fa-fw fa-plus"></i> Add Role</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"  aria-expanded="false">{{Auth::guard('admin')->user()->fullname}} <span class="caret"></span></a>

                        <ul class="dropdown-menu" role="menu">
                            @if (Auth::guard('admin')->check())
                                <li>
                                    <a href="{{ URL::to('/admin/logout') }}">Logout</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/admin/edit/adminusers/'.Auth::guard('admin')->user()->id) }}">Profile</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ URL::to('/admin/login') }}">Login</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
            @if (Auth::guard('admin')->check())
				<div id="sidebar">
					<div id="sidebar-button">
						<i class="fa fa-angle-left fa-3x"></i>
					</div>
	                <ul class="nav navbar-nav navbar">
	                    <li class="site-link">
	                        <a href="{{ URL::to('/') }}">View Site</a>
	                    </li>
	                    <li class="active">
	                        <a href="{{ URL::to('/admin/') }}">DashBoard</a>
	                    </li>
	                    @foreach(config('laraCms.admin.list.section') as $section)
	                        @if ( isset($section['menu']['top-bar']['show']) && $section['menu']['top-bar']['show']==true  && Auth::guard('admin')->user()->canViewSection($section))
	                            <li class="dropdown">
	                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ $section['title'] }}
	                                    <span class="caret"></span>
	                                </a>
	                                <ul class="dropdown-menu" role="menu">
	                                    <li>
	                                        <a href="{{ ma_get_admin_list_url($section['model']) }}"><i class="fa fa-list"></i> {{ $section['title'] }}</a>
	                                    </li>
	                                    @if ( isset($section['menu']['top-bar']['action']) )
	                                        @foreach($section['menu']['top-bar']['action'] as $action )
	                                            @if ( $action == "add" )
	                                                <li>
	                                                    <a href="{{  ma_get_admin_create_url($section['model']) }}"><i class="fa fa-plus"></i> Add {{ $section['title'] }}</a>
	                                                </li>
	                                            @elseif ( $action == "website" )
	                                                <li>
	                                                    <a href="{{ URL::to('') }}" class="color-2" target="_new"><i class="fa fa-globe"></i> View site </a>
	                                                </li>
	                                            @endif
	                                        @endforeach
	                                    @endif
	                                    @if ( isset($section['menu']['top-bar']['submodel']) )
	                                        @foreach($section['menu']['top-bar']['submodel'] as $item )

	                                            <li>
	                                                <a href="{{ ma_get_admin_list_url($item['model']) }}"><i class="fa fa-list"></i> {{ ucfirst ($item['label'])  }}</a>
	                                            </li>
	                                            @if($item['add']==1)
	                                            <li>
	                                                <a href="{{  ma_get_admin_create_url($item['model']) }}"><i class="fa fa-plus"></i> Add {{ ucfirst ($item['label'])  }}</a>
	                                            </li>
	                                            @endif

	                                       @endforeach
	                                   @endif

	                               </ul>
	                           </li>
	                       @endif
	                   @endforeach
	               </ul>
			   </div>
           @endif
       </div>

       @endif

   </div>
</nav>
