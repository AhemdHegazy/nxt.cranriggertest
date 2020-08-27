@extends('layouts.front')
@section('content')
    <div class="page-content">
        <section class="position-relative">
            <div id="particles-js">
                <canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;" width="1898" height="335"></canvas></div>
            <div class="container">
                <div class="row  text-center">
                    <div class="col">
                        <h1>Packages</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                                <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">Pages</li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Packages</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- / .row -->
            </div>
            <!-- / .container -->
        </section>
        <!--screenshots start-->
        <section class="p-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 mb-8">
                        <div>
                            <h2 class="mt-3">Organization Packages</h2>
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
    </div>
@endsection
