@extends('layouts.front')
@section('content')
    <section class="position-relative">
        <div id="particles-js">
            <canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;" width="1898"
                    height="335"></canvas>
        </div>
        <div class="container">
            <div class="row  text-center">
                <div class="col">
                    <h1>Product Checkout</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                            <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">Checkout</li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Checkout Status</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- / .row -->
        </div>
        <!-- / .container -->
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="">
                        <div class="p-3 p-lg-5 border">
                            <h3 class="mb-3">Payment Status</h3>

                            <div id="showPayForm"></div>

                            @if(isset($success))
                                <section class="">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-lg-12 mb-8 mb-lg-0">
                                                <!-- Blog Card -->
                                                <div class="card border-0 shadow">
                                                    <div class="row m-3">
                                                        <div class="col-lg-3 text-left">
                                                            <span class="la la-check-circle la-5x text-success" style="font-size: 100px"></span>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <h4>Success</h4>
                                                            <p class="lead">Your Payment Operation Completed Successfully, You can take exam now please back to your dashboard, or start from the next button</p>
                                                            <a href="{{route('exam.begin',$order->id)}}" class="btn btn-primary btn-xs" style="padding: 3px 5px;font-size: 14px">Start now Exam Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            @endif


                            @if(isset($fail))
                                <section class="">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-lg-12 mb-8 mb-lg-0">
                                                <!-- Blog Card -->
                                                <div class="card border-0 shadow">
                                                    <div class="row m-3">
                                                        <div class="col-lg-3 text-left">
                                                            <span class="la la-times-circle la-5x text-danger" style="font-size: 100px"></span>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <h4>Unfortunately</h4>
                                                            <p class="lead">The Payment Operation do'not achieved please try again or contact us </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            @endif
                            @if (auth()->user()->is_company == 1)
                                <a href="{{route('company.info')}}" class="btn btn-danger">Back To Home</a>
                            @else
                                <a href="{{route('user.info')}}" class="btn btn-danger">Back To Home</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
