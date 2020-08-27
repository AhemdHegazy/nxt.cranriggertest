
<!--header start-->
<header class="site-header">
    <div id="header-wrap">
        <div class="container">
            <div class="row">
                <!--menu start-->
                <div class="col d-flex align-items-center justify-content-between">
                    <a class="navbar-brand logo text-dark h3 mb-0" href="{{route('index')}}" style="font-size: 1.25rem;">
                        Crane Operator And Rigger <span class="text-danger font-weight-bold">Test System.</span>
                    </a>
                    <nav class="navbar navbar-expand-lg navbar-light ml-auto">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('index')}}">Home</a>
                                </li>

                               <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{route('guest.about')}}">About US</a>
                                </li>-->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('guest.blog')}}">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('guest.packages')}}">Packages</a>
                                </li>

                                @auth()
                                 @if(auth()->user()->is_company == 1)
                                <li>

                                   <a class="nav-link" href="{{route('company.info')}}" >

                                       Profile
                                    </a>
                                 </li>
                                        @else
                                <li>
                                 <a class="nav-link" href="{{route('user.info')}}" >

                                    Profile
                                </a>

                                </li>
                                @endif
                                @endauth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('guest.contact')}}">Support</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <ul class="navbar-nav ml-">
                            @auth()
                            <li class="nav-item dropdown">
                                <a class="nav-link text-danger dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="true">
                                    <i class="la la-dot-circle-o mr-2 d-inline-block"></i>
                                    Account</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" >
                                            <i class="la la-lock mr-2 d-inline-block"></i>
                                            {{auth()->user()->name}}
                                        </a>

                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('testimonial.index')}}">
                                            <i class="la la-lock mr-2 d-inline-block"></i>
                                            Testimonials
                                        </a>

                                    </li>
                                    <li>
                                        @if(auth()->user()->is_company == 1)
                                            <a class="dropdown-item" href="{{route('company.info')}}" >
                                                <i class="la la-lock mr-2 d-inline-block"></i>
                                               Profile
                                            </a>
                                        @else
                                            <a class="dropdown-item" href="{{route('user.info')}}" >
                                                <i class="la la-lock mr-2 d-inline-block"></i>
                                                Profile
                                            </a>
                                        @endif
                                    </li>
                                    <li><a class="dropdown-item" href="{{route('logout.guest')}}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();" >
                                            <i class="la la-sign-in mr-2 d-inline-block"></i>
                                            Logout</a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout.guest') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>

                            @else
                            <li class="nav-item dropdown">
                                <a class="nav-link text-danger dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="true">
                                    <i class="la la-user mr-2 d-inline-block"></i>
                                    Account</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('login.guest')}}">
                                            <i class="la la-sign-in mr-2 d-inline-block"></i>
                                            Sign in</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{route('register.type')}}">
                                            <i class="la la-sign mr-2 d-inline-block"></i>
                                            Sign Up</a>
                                    </li>

                            @endauth
                            </ul>
                        </li>

                    </ul>
                    <ul class="navbar-nav ml-">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-danger dropdown-toggle" href="#" data-toggle="dropdown" >
                                <i class="la la-globe d-inline-block"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="">
                                        <i class="la la-globe-africa mr-2 d-inline-block"></i>
                                        Arabic</a>
                                </li>
                                <li><a class="dropdown-item" href="">
                                        <i class="la la-globe-europe mr-2 d-inline-block"></i>
                                        English</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--menu end-->
            </div>
        </div>
    </div>
</header>
