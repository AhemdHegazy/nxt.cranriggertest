<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-5 col-xl-6 order-lg-2 mb-8 mb-lg-0">
                <!-- Image -->
                <img src="{{asset('assets/images/hero/05.png')}}" class="img-fluid" alt="...">
            </div>
            <div class="col-12 col-lg-7 col-xl-6 order-lg-1">
                <!-- Heading -->
                <h1 class="display-4 mt-3">
                    Study and Take Our Test to Get Certified.
                </h1>
         {{--       <!-- Text -->
                <p class="lead text-muted">Test your experience in heavy equipment buy take out tests there are may packages you
                can choose from</p>--}}
                <!-- Buttons -->
                <a href="{{route('guest.packages')}}" class="btn btn-danger text-white text-left mr-1"> <i class="la la-dollar-sign mr-2 ic-2x d-inline-block"></i>
                    <div class="d-inline-block"> <small class="d-block">Check our</small>
                        Package</div>
                </a>
                <a href="{{route('register.type')}}" class="btn btn-dark text-white text-left"> <i class="la la-user mr-2 ic-2x d-inline-block"></i>
                    <div class="d-inline-block"> <small class="d-block">Register </small>
                        Now</div>
                </a>
            </div>
        </div>
        <!-- / .row -->
    </div>
    <!-- / .container -->
</section>
