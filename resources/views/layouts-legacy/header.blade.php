<!--=========header start============-->
<header class="header1">
    <div class="container">
        <div class="row ">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 display-block ">
                <a href="index.html" class="logo"><img src="{{asset('frontend/images/logo.png')}}" class="img-responsive" alt="logo"></a>
            </div>
            <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12 pull-right">
                <div class="mob-social display-none">
                    <div class="search-column">
                        <button name="button" type="button" class="search-btn"  data-toggle="modal" data-target=".bs-example-modal-lg"></button>
                    </div>
                </div>
                <span class="display-block">
                    @auth()
                        <a class="header-requestbtn hvr-bounce-to-right btn-xs"onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" href="{{route('logout.guest')}}" style="margin: 5px"><span class="fa fa-sign-out"></span> Sign out
                    </a>

                        <form id="logout-form" action="{{ route('logout.guest') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                        <a class="header-requestbtn hvr-bounce-to-right btn-xs" href="{{route('login.guest')}}" style="margin: 5px"><span class="fa fa-sign-in"></span> Sign In</a>
                        <a class="header-requestbtn hvr-bounce-to-right btn-xs" href="{{route('register.type')}}" style="margin: 5px"><span class="fa fa-user"></span> Sign Up</a>
                    @endauth
                </span>
            </div>
        </div>
    </div>
    <nav id="main-navigation-wrapper" class="navbar navbar-default ">
        <div class="container">
            <div class="navbar-header">
                <div class="logo-menu"><a href="index.html"><img src="{{asset('front/images/white-logo.png')}}" alt="logo"></a></div>
                <button type="button" data-toggle="collapse" data-target="#main-navigation" aria-expanded="false" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div id="main-navigation" class="collapse navbar-collapse ">
                <ul class="nav navbar-nav">
                    <li><a href="contact.html">Home</a></li>
                    <li><a href="contact.html">Guidelines</a></li>
                    <li><a href="contact.html">Get Ready</a></li>
                    <li><a href="contact.html">About us</a></li>
                    <li><a href="contact.html">Contact us</a></li>
                    <li><a href="contact.html">Blog</a></li>
                </ul>
                <div class="header-nav-right">
                    <div class="search-column">
                        <button name="button" type="button" class="search-btn"  data-toggle="modal" data-target=".bs-example-modal-lg"></button>
                    </div>
                    <span class="display-none">
                     <a class="header-requestbtn hvr-bounce-to-right" href="request-quote.html">Read Guidelines</a></span>
                </div>
            </div>
        </div>
    </nav>
</header>
<!--=========header end============-->
