<header id="header">
    <div class="logo">
        <a href="{{route('home.index')}}" class="hidden-xs">
              Test System
            <small>
                Crane Operator And Rigger
            </small>
        </a>
        <i class="logo__trigger zmdi zmdi-menu" data-mae-action="block-open" data-mae-target="#navigation"></i>
    </div>

    <ul class="top-menu">
        <li class="top-menu__alerts" data-mae-action="block-open" data-mae-target="#notifications" data-toggle="tab" data-target="#notifications__messages">
            <a href="#"><i class="zmdi zmdi-notifications"></i></a>
        </li>
        <li class="top-menu__profile dropdown">
            <a data-toggle="dropdown" href="#">
                <img src="{{asset('assets/images/team/01.png')}}" alt="">
            </a>

            <ul class="dropdown-menu pull-right dropdown-menu--icon">
                <li>
                    <h5 style="text-align: center;font-weight: bold">{{auth('admin')->user()->name}}</h5>
                </li>
                <li>
                    <a href="{{route('profile.index')}}"><i class="zmdi zmdi-account"></i> View Profile</a>
                </li>
              {{--  <li>
                    <a href="{{route('settings.index')}}"><i class="zmdi zmdi-settings"></i> Settings</a>
                </li>--}}
                <li>
                    <a href="{{ route('admin.logout') }}" class="text-white"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</header>
