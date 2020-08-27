<section>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-md-12 col-lg-8 mb-8">
                <div>
                    <h2 class="mt-3">User Comments</h2>
                    <p class="lead mb-0">We are very proud that we introduce a service that get clients happy and we promis to be like this all the time</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col">
                <div class="owl-carousel no-pb owl-2" data-dots="false" data-nav="true" data-items="1" data-autoplay="false">
                    @foreach(\App\Testimonial::where('stars',1)->get() as $test)
                    <div class="item">
                        <div class="row justify-content-center text-center">
                            <div class="col-12 col-md-10 col-lg-8">
                                <div class="card bg-transparent border-0">
                                    <div>
                                        <img alt="Image" src="{{ asset('assets/images/testimonial/01.jpg')}} " class="shadow-danger img-fluid rounded-circle d-inline">
                                    </div>
                                    <div class="card-body p-0 mt-5">
                                        <p class="lead">{{$test->content}}</p>
                                        <div>
                                            <h5 class="text-danger d-inline mb-0">{{$test->user->name}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
