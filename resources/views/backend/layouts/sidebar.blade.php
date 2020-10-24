<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="{{ route('backend.dashboard.index') }}">
            &nbsp;
            <img src="{{ asset('uploads/images/'.$setting->logo) }}" width="200px" class="logo center" alt="">
        </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li>
            <a target="_blank" href="{{ route('index') }}" class="waves-effect">
                <i class="icon-home"></i> <span>Go to Website</span>
            </a>
        </li>
        <li class="sidebar-header">ADMIN DASHBOARD</li>
        @can('view-dashboard')
        <li>
            <a href="{{ route('backend.dashboard.index') }}" class="waves-effect">
                <i class="icon-home"></i> <span>Dashboard</span>
            </a>
        </li>
        @endcan

        @can('view-location')
        <li>
            <a href="{{ route('backend.location.index') }}" class="waves-effect">
                <i class="icon-home"></i> <span>Location</span>
            </a>
        </li>
        @endcan

        @can('view-service-category')
        <li>
            <a href="{{ route('backend.service-category.index') }}" class="waves-effect">
                <i class="icon-home"></i> <span>Services</span>
            </a>
        </li>
        @endcan

        @can('view-hotel')
            <li>
                <a href="javaScript:void();" class="waves-effect">
                    <i class="icon-briefcase"></i>
                    <span>Hotels</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('backend.hotel.index') }}"><i class="fa fa-circle-o"></i>All</a></li>
                    @can('add-hotel')
                    <li><a href="{{ route('backend.hotel.create') }}"><i class="fa fa-circle-o"></i>Add new</a></li>
                    @endcan
                </ul>

            </li>
        @endcan

        @can('view-blog')
            <li>
                <a href="javaScript:void();" class="waves-effect">
                    <i class="icon-briefcase"></i>
                    <span>Blogs</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('backend.blog.index') }}"><i class="fa fa-circle-o"></i>All</a></li>
                    @can('add-blog')
                        <li><a href="{{ route('backend.blog.create') }}"><i class="fa fa-circle-o"></i>Add new</a></li>
                    @endcan
                </ul>

            </li>
        @endcan



        @can('view-my-hotel')
            <li class="sidebar-header">My Hotels</li>
            @foreach(auth()->user()->myHotels as $my)
            <li><a href="{{ route('backend.hotel.show',\Illuminate\Support\Facades\Crypt::encryptString($my->hotel->id)) }}" class="waves-effect"><i class="fa fa-circle-o text-red"></i> <span>{{ $my->hotel->name }}</span></a></li>
            @endforeach
        @endcan

        <li class="sidebar-header">SETTING</li>
        @can('manage-frontend')
        <li><a href="{{ route('backend.frontend.index') }}" class="waves-effect"><i class="fa fa-circle-o text-red"></i> <span>Setting</span></a></li>
        @endcan

        @can('manage-setting')
        <li><a href="{{ route('backend.setting.index') }}" class="waves-effect"><i class="fa fa-circle-o text-red"></i> <span>Developer</span></a></li>
        @endcan
        <li><a href="#" class="waves-effect"><i class="fa fa-circle-o text-yellow"></i> <span>FAQ</span></a></li>

    </ul>
</div>


