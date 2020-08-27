<footer class="py-2 bg-dark position-relative bg-contain bg-pos-r" data-bg-img="{{ asset('assets/images/bg/02.png')}} ">
    <div class="shape-1" style="height: 150px; overflow: hidden;">
        <svg viewBox="0 0 0 0" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <path d="M0.00,49.98 C150.00,150.00 271.49,-50.00 500.00,49.98 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: #fff;"></path>
        </svg>
    </div>
    <div class="container mt-11">
        <div class="row mt-5">
            <div class="col-12 col-sm-8">
                <a class="footer-logo text-white h2 mb-0" href="{{route('index')}}">
                    Crane Operator And Rigger<span class="font-weight-bold"> Test System.</span>
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 col-sm-3 navbar-dark">
                <h5 class="mb-4 text-white">Pages</h5>
                <ul class="navbar-nav list-unstyled mb-0">
                    <li class="nav-item"><a class="nav-link" href="{{route('index')}}">Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('guest.about')}}">About</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('guest.contact')}}">Contact</a>
                    </li>

                </ul>
            </div>
            <div class="col-12 col-sm-3 mt-6 mt-sm-0 navbar-dark">
                <h5 class="mb-4 text-white">Service & Blog</h5>
                <ul class="navbar-nav list-unstyled mb-0">
                    <li class="nav-item"><a class="nav-link" href="{{route('guest.fqa')}}">FQA</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('guest.packages')}}">Packages</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('guest.blog')}}">Blog</a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-sm-3 mt-6 mt-sm-0 navbar-dark">
                <h5 class="mb-4 text-white">Legal & Terms</h5>
                <ul class="navbar-nav list-unstyled mb-0">
                    <li class="nav-item"><a class="nav-link" href="{{route('guest.terms')}}">Term Of Service</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('guest.policy')}}">Privacy Policy</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('login.guest')}}">Account</a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-sm-3 text-center">
                <img src="{{asset('logo-white.png')}}" alt="" class="img-fluid">
            </div>
        </div>

    </div>
</footer>
