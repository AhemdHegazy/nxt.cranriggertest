@extends('layouts.front')
@section('content')
    @include('layouts.slider')
    <div class="page-content">
    <!--testimonial start-->
    @include('layouts.testimonials')
    <!--testimonial end-->
        <!--about start-->
        <section class="pt-0">

            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 col-lg-6 mb-6 mb-lg-0">
                        <div class="row align-items-center no-gutters">
                            <div class="col">
                                <img src="{{asset('logo-color.png')}}" alt="Image" style="height:250px" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-5">
                        <div>
                            <h2 class="mt-3">This system is built for anyone interested in to get knowledge about
                                crane operator and rigger. </h2>
                            <p class="lead">This system is built for anyone interested in to get knowledge about
                                crane operator and rigger.</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-5">
                            <div class="counter">
                                <div class="counter-desc"> <span class="count-number display-4" data-to="15" data-speed="1000">{{\App\Package::count()}}</span>
                                    <span class="display-4 text-danger"></span>
                                    <h6 class="text-muted mb-0">Packages</h6>
                                </div>
                            </div>
                            <div class="counter">
                                <div class="counter-desc"> <span class="count-number display-4" data-to="29" data-speed="1000">{{\App\Subject::count()}}</span>
                                    <span class="display-4 text-danger"></span>
                                    <h6 class="text-muted mb-0">Subjects</h6>
                                </div>
                            </div>
                            <div class="counter">
                                <div class="counter-desc"> <span class="count-number display-4" data-to="23" data-speed="1000">{{\App\User::count()}}</span>
                                    <span class="display-4 text-danger"></span>
                                    <h6 class="text-muted mb-0">Clients</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--about end-->
        <!--services start-->
        <section class="pt-0">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-12 col-md-12 col-lg-8 mb-8">
                        <div>
                            <h2 class="mt-3">Our Exam Goals</h2>
                            <p class="lead mb-0">Make sure that you follow the instructions to get ready for our exam that will be
                                awesome if you get high score.</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-4 col-12 text-lg-right">
                        <div class="d-flex align-items-start mb-8">
                            <div class="order-lg-1 ml-lg-3">
                                <div class="f-icon-shape-sm text-white bg-danger rounded-circle shadow-danger mr-3 mr-lg-0"> <i class="la la-wechat ic-2x"></i>
                                </div>
                            </div>
                            <div>
                                <h5>Learn From Blog</h5>
                                <p class="mb-0">There are many lessons that help you to pass the exam .</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-8">
                            <div class="order-lg-1 ml-lg-3">
                                <div class="f-icon-shape-sm text-white bg-danger rounded-circle shadow-danger mr-3 mr-lg-0"> <i class="la la-desktop ic-2x"></i>
                                </div>
                            </div>
                            <div>
                                <h5>Download Our PDF File</h5>
                                <p class="mb-0">Download the necessary PDF to help you pass the exam
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <div class="order-lg-1 ml-lg-3">
                                <div class="f-icon-shape-sm text-white bg-danger rounded-circle shadow-danger mr-3 mr-lg-0"> <i class="ti-check-box ic-2x"></i>
                                </div>
                            </div>
                            <div>
                                <h5>Packages</h5>
                                <p class="mb-0">Choose suitable package after taking exam</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 my-5 my-lg-0">
                        <img src="assets/images/about/09.png" alt="Image" style="height:250px" class="img-fluid">
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="d-flex align-items-start mb-8">
                            <div>
                                <div class="f-icon-shape-sm text-white bg-danger rounded-circle shadow-danger mr-3"> <i class="la la-eye ic-2x"></i>
                                </div>
                            </div>
                            <div>
                                <h5>Customize Package</h5>
                                <p class="mb-0">if you want to get more time please custmize packge by increase time </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-8">
                            <div>
                                <div class="f-icon-shape-sm text-white bg-danger rounded-circle shadow-danger mr-3"> <i class="la la-film ic-2x"></i>
                                </div>
                            </div>
                            <div>
                                <h5>Start you exam</h5>
                                <p class="mb-0">Start your Exam  and get certified</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <div>
                                <div class="f-icon-shape-sm text-white bg-danger rounded-circle shadow-danger mr-3"> <i class="la la-headphones ic-2x"></i>
                                </div>
                            </div>
                            <div>
                                <h5>24/7 Support</h5>
                                <p class="mb-0">please if you face any problem contact us.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--services end-->


        <!--org start-->
        @if(auth()->user())
            @if(auth()->user()->is_company == 1)
                <section class="p-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-8 mb-8">
                                <div>
                                    <h2 class="mt-3">Companies Packages</h2>
                                    <p class="lead">choose from different packages with different number of questions and with different paid you can customize your package
                                        by increase exam duration</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="owl-carousel owl-center no-pb" data-dots="false" data-center="true" data-items="3" data-autoplay="false">
                                    @foreach ($CompanyPackages as $order)
                                        <div class="item">
                                            <div class="card border-0 shadow">
                                                <!-- Body -->
                                                <div class="card-body py-8 px-6">
                                                    <!-- Badge -->
                                                    <div class="text-center mb-5"> <span class="badge shadow">
                                                    <span class="h6 text-uppercase">{{$order->name}}</span>
                                              </span>
                                                    </div>

                                                    <div class="d-flex align-items-start justify-content-between">
                                                        <!-- Text -->
                                                        <p>Questions</p>
                                                        <!-- Check -->
                                                        <div class="ml-4">
                                                        <span class="badge badge-primary-soft ">
                                                            {{$order->questions}}
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-start justify-content-between">
                                                        <!-- Text -->
                                                        <p>Subject</p>
                                                        <!-- Check -->
                                                        <div class="ml-4">
                                                        <span class="badge badge-primary-soft ">
                                                            {{$order->subject->name}}
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-start justify-content-between">
                                                        <!-- Text -->
                                                        <p>Hours</p>
                                                        <!-- Check -->
                                                        <div class="ml-4">
                                                        <span class="badge badge-primary-soft ">
                                                            {{$order->hours}}
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-start justify-content-between">
                                                        <!-- Text -->
                                                        <p>Increase Price Per Hours</p>
                                                        <!-- Check -->
                                                        <div class="ml-4">
                                                        <span class="badge badge-primary-soft ">
                                                            {{$order->increase}}
                                                        </span>
                                                        </div>
                                                    </div>

                                                    <!-- Price -->
                                                    <div class="d-flex justify-content-center mt-5"> <span class="h3 mb-0 mt-2">SR</span>
                                                        <span class="price display-3 text-danger font-w-6">{{$order->price}}</span>
                                                    </div>
                                                    <!-- Text -->
                                                    <!-- Button -->
                                                    <div class="row">

                                                        <a href="{{route('order.place',$order->id)}}" class="btn btn-dark  text-white text-left mr-1"> <i class="la la-dollar-sign mr-2 ic-2x d-inline-block"></i>
                                                            <div class="d-inline-block"> <small class="d-block">Order</small>
                                                                Package</div>
                                                        </a>
                                                        <a href="{{route('order.customize',$order->id)}}" class="btn btn-danger text-white text-left mr-1"> <i class="la la-dollar-sign mr-2 ic-2x d-inline-block"></i>
                                                            <div class="d-inline-block"> <small class="d-block">Customize</small>
                                                                Package</div>
                                                        </a>
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
            @elseif(auth()->user()->is_company == 0)
                <section class="p-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-8 mb-8">
                                <div>
                                    <h2 class="mt-3">Individuals Packages</h2>
                                    <p class="lead">choose from different packages with different number of questions and with different paid you can customize your package
                                        by increase exam duration</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="owl-carousel owl-center no-pb" data-dots="false" data-center="true" data-items="3" data-autoplay="false">
                                    @foreach ($UsersPackages as $order)
                                        <div class="item">
                                            <div class="card border-0 shadow">
                                                <!-- Body -->
                                                <div class="card-body py-8 px-6">
                                                    <!-- Badge -->
                                                    <div class="text-center mb-5"> <span class="badge shadow">
                                                    <span class="h6 text-uppercase">{{$order->name}}</span>
                                              </span>
                                                    </div>

                                                    <div class="d-flex align-items-start justify-content-between">
                                                        <!-- Text -->
                                                        <p>Questions</p>
                                                        <!-- Check -->
                                                        <div class="ml-4">
                                                        <span class="badge badge-primary-soft ">
                                                            {{$order->questions}}
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-start justify-content-between">
                                                        <!-- Text -->
                                                        <p>Subject</p>
                                                        <!-- Check -->
                                                        <div class="ml-4">
                                                        <span class="badge badge-primary-soft ">
                                                            {{$order->subject->name}}
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-start justify-content-between">
                                                        <!-- Text -->
                                                        <p>Hours</p>
                                                        <!-- Check -->
                                                        <div class="ml-4">
                                                        <span class="badge badge-primary-soft ">
                                                            {{$order->hours}}
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-start justify-content-between">
                                                        <!-- Text -->
                                                        <p>Increase Price Per Hours</p>
                                                        <!-- Check -->
                                                        <div class="ml-4">
                                                        <span class="badge badge-primary-soft ">
                                                            {{$order->increase}}
                                                        </span>
                                                        </div>
                                                    </div>

                                                    <!-- Price -->
                                                    <div class="d-flex justify-content-center mt-5"> <span class="h3 mb-0 mt-2">SR</span>
                                                        <span class="price display-3 text-danger font-w-6">{{$order->price}}</span>
                                                    </div>
                                                    <!-- Text -->
                                                    <!-- Button -->
                                                    <div class="row">

                                                        <a href="{{route('order.place',$order->id)}}" class="btn btn-dark  text-white text-left mr-1"> <i class="la la-dollar-sign mr-2 ic-2x d-inline-block"></i>
                                                            <div class="d-inline-block"> <small class="d-block">Order</small>
                                                                Package</div>
                                                        </a>
                                                        <a href="{{route('order.customize',$order->id)}}" class="btn btn-danger text-white text-left mr-1"> <i class="la la-dollar-sign mr-2 ic-2x d-inline-block"></i>
                                                            <div class="d-inline-block"> <small class="d-block">Customize</small>
                                                                Package</div>
                                                        </a>
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
            @endif
        @else
            <section class="p-0">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 mb-8">
                            <div>
                                <h2 class="mt-3">Companies Packages</h2>
                                <p class="lead">choose from different packages with different number of questions and with different paid you can customize your package
                                    by increase exam duration</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row align-items-center">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="owl-carousel owl-center no-pb" data-dots="false" data-center="true" data-items="3" data-autoplay="false">
                                @foreach ($CompanyPackages as $order)
                                    <div class="item">
                                        <div class="card border-0 shadow">
                                            <!-- Body -->
                                            <div class="card-body py-8 px-6">
                                                <!-- Badge -->
                                                <div class="text-center mb-5"> <span class="badge shadow">
                                                <span class="h6 text-uppercase">{{$order->name}}</span>
                                          </span>
                                                </div>

                                                <div class="d-flex align-items-start justify-content-between">
                                                    <!-- Text -->
                                                    <p>Questions</p>
                                                    <!-- Check -->
                                                    <div class="ml-4">
                                                    <span class="badge badge-primary-soft ">
                                                        {{$order->questions}}
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-start justify-content-between">
                                                    <!-- Text -->
                                                    <p>Subject</p>
                                                    <!-- Check -->
                                                    <div class="ml-4">
                                                    <span class="badge badge-primary-soft ">
                                                        {{$order->subject->name}}
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-start justify-content-between">
                                                    <!-- Text -->
                                                    <p>Hours</p>
                                                    <!-- Check -->
                                                    <div class="ml-4">
                                                    <span class="badge badge-primary-soft ">
                                                        {{$order->hours}}
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-start justify-content-between">
                                                    <!-- Text -->
                                                    <p>Increase Price Per Hours</p>
                                                    <!-- Check -->
                                                    <div class="ml-4">
                                                    <span class="badge badge-primary-soft ">
                                                        {{$order->increase}}
                                                    </span>
                                                    </div>
                                                </div>

                                                <!-- Price -->
                                                <div class="d-flex justify-content-center mt-5"> <span class="h3 mb-0 mt-2">SR</span>
                                                    <span class="price display-3 text-danger font-w-6">{{$order->price}}</span>
                                                </div>
                                                <!-- Text -->
                                                <!-- Button -->
                                                <div class="row">

                                                    <a href="{{route('order.place',$order->id)}}" class="btn btn-dark  text-white text-left mr-1"> <i class="la la-dollar-sign mr-2 ic-2x d-inline-block"></i>
                                                        <div class="d-inline-block"> <small class="d-block">Order</small>
                                                            Package</div>
                                                    </a>
                                                    <a href="{{route('order.customize',$order->id)}}" class="btn btn-danger text-white text-left mr-1"> <i class="la la-dollar-sign mr-2 ic-2x d-inline-block"></i>
                                                        <div class="d-inline-block"> <small class="d-block">Customize</small>
                                                            Package</div>
                                                    </a>
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
            <hr>
            <section class="p-0">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 mb-8">
                            <div>
                                <h2 class="mt-3">Individuals Packages</h2>
                                <p class="lead">choose from different packages with different number of questions and with different paid you can customize your package
                                    by increase exam duration</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row align-items-center">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="owl-carousel owl-center no-pb" data-dots="false" data-center="true" data-items="3" data-autoplay="false">
                                @foreach ($UsersPackages as $order)
                                    <div class="item">
                                        <div class="card border-0 shadow">
                                            <!-- Body -->
                                            <div class="card-body py-8 px-6">
                                                <!-- Badge -->
                                                <div class="text-center mb-5"> <span class="badge shadow">
                                                <span class="h6 text-uppercase">{{$order->name}}</span>
                                          </span>
                                                </div>

                                                <div class="d-flex align-items-start justify-content-between">
                                                    <!-- Text -->
                                                    <p>Questions</p>
                                                    <!-- Check -->
                                                    <div class="ml-4">
                                                    <span class="badge badge-primary-soft ">
                                                        {{$order->questions}}
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-start justify-content-between">
                                                    <!-- Text -->
                                                    <p>Subject</p>
                                                    <!-- Check -->
                                                    <div class="ml-4">
                                                    <span class="badge badge-primary-soft ">
                                                        {{$order->subject->name}}
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-start justify-content-between">
                                                    <!-- Text -->
                                                    <p>Hours</p>
                                                    <!-- Check -->
                                                    <div class="ml-4">
                                                    <span class="badge badge-primary-soft ">
                                                        {{$order->hours}}
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-start justify-content-between">
                                                    <!-- Text -->
                                                    <p>Increase Price Per Hours</p>
                                                    <!-- Check -->
                                                    <div class="ml-4">
                                                    <span class="badge badge-primary-soft ">
                                                        {{$order->increase}}
                                                    </span>
                                                    </div>
                                                </div>

                                                <!-- Price -->
                                                <div class="d-flex justify-content-center mt-5"> <span class="h3 mb-0 mt-2">SR</span>
                                                    <span class="price display-3 text-danger font-w-6">{{$order->price}}</span>
                                                </div>
                                                <!-- Text -->
                                                <!-- Button -->
                                                <div class="row">

                                                    <a href="{{route('order.place',$order->id)}}" class="btn btn-dark  text-white text-left mr-1"> <i class="la la-dollar-sign mr-2 ic-2x d-inline-block"></i>
                                                        <div class="d-inline-block"> <small class="d-block">Order</small>
                                                            Package</div>
                                                    </a>
                                                    <a href="{{route('order.customize',$order->id)}}" class="btn btn-danger text-white text-left mr-1"> <i class="la la-dollar-sign mr-2 ic-2x d-inline-block"></i>
                                                        <div class="d-inline-block"> <small class="d-block">Customize</small>
                                                            Package</div>
                                                    </a>
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
        @endif
        <!--screenshots end-->
        <!--blog start-->

        <section>
            <div class="container">
                <div class="row align-items-end mb-5">
                    <div class="col-12 col-md-12 col-lg-4">
                        <div>
                            <h2 class="mt-4 mb-0">From Our Blog List Latest Feed</h2>
                        </div>
                    </div>

                </div>
                <!-- / .row -->
                <div class="row">
                    @foreach(\App\Post::inRandomOrder()->limit(3)->get() as $post)
                            <div class="col-12 col-lg-4 mb-6 mb-lg-0">
                                <!-- Blog Card -->
                                <div class="card border-0 bg-transparent">
                                    <div class="position-absolute bg-white shadow-primary text-center p-2 rounded ml-3 mt-3">{{date("d",strtotime($post->created_at))}}
                                        <br>{{date("M",strtotime($post->created_at))}}</div>
                                    <img class="card-img-top shadow rounded" style="height: 250px" src="{{$post->featured ? asset($post->featured) : asset('assets/images/blog/01.png')}}" alt="Image">
                                    <div class="card-body pt-5"> <a class="d-inline-block text-muted mb-2" href="#">Crane Operator & Rigger</a>
                                        <h2 class="h5 font-weight-medium">
                                            <a class="link-title" href="{{route('blog.single',$post->id)}}">{{$post->title}}</a>
                                        </h2>
                                        <p>{{Str::limit($post->description,50)}}</p>
                                    </div>
                                   {{-- <div class="card-footer bg-transparent border-0 pt-0">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item pr-4"> <a href="#" class="text-muted"><i class="ti-comments mr-1 text-danger"></i> 131</a>
                                            </li>
                                            <li class="list-inline-item pr-4"> <a href="#" class="text-muted"><i class="ti-eye mr-1 text-danger"></i> 255</a>
                                            </li>
                                            <li class="list-inline-item"> <a href="#" class="text-muted"><i class="ti-comments mr-1 text-danger"></i> 14</a>
                                            </li>
                                        </ul>
                                    </div>--}}
                                    <div></div>
                                </div>
                                <!-- End Blog Card -->
                            </div>
                        @endforeach
                </div>
            </div>
        </section>

        <!--blog end-->

    </div>
@endsection
