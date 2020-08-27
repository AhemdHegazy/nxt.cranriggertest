@extends('layouts.front')
@section('content')
    <div class="page-content">
        <section class="position-relative">
            <div id="particles-js">
                <canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;" width="1898" height="250"></canvas></div>
            <div class="container">
                <div class="row  text-center">
                    <div class="col">
                        <h1>Welcome {{auth()->user()->name }}</h1>
                    </div>
                </div>
                <!-- / .row -->
            </div>
            <!-- / .container -->
        </section>
        <section class="">
            <div class="container">
                <div class="row justify-content-center text-center">
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                    <div class="col-12 col-md-12 col-lg-12 mb-8 mb-lg-0">
                        <div class="mb-8">
                            <h2 class="mt-3 font-w-5"> Orders</h2>
                            <p class="lead mb-0">
                                You can see your orders here past an hanged orders you can see the result of the exam of past order</p>
                        </div>
                    </div>
                </div>
                <!-- / .row -->

                <div class="row">
                    <div class="col-12 col-lg-12 mb-8 mb-lg-0">
                        <!-- Blog Card -->
                        <div class="card border-0 shadow">
                            <div class="row no-gutters">

                                <div class="col-md-9">
                                    <div class="card-body">
                                        <div class="row">
                                            @if(isset($success))
                                                <div class="alert alert-success">
                                                    {{$success}}
                                                </div>
                                            @endif
                                            <div class="col-lg-12 mt-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <span class="badge badge-primary-soft p-2 font-w-6">
                                                             Un-Paid Orders
                                                        </span>
                                                        @foreach(\App\Order::where(['user_id' =>auth()->user()->id,'status' => 0])->get() as $order)
                                                            <div style="position: relative">
                                                                <a class="btn btn-link text-dark btn-sm bg-primary-soft mt-1 mb-1 btn-block text-left" >
                                                                <span class="badge text-danger">
                                                                    #{{$order->id}}
                                                                </span>
                                                                    <span class="la la-question-circle ml-2 mr-2"></span>{{$order->package->questions}} Questions |
                                                                    <span class="la la-clock-o  mr-2 ml-2"></span>{{$order->hours}} Hours
                                                                    <span class="pull-right" style="float: right">
                                                                    @if(auth()->user()->has_company == 0)
                                                                    <span class="la la-money-bill-wave-alt mr-2"></span>{{$order->amount}} SR
                                                                    @endif
                                                                </span>

                                                                </a>

                                                                <a href="{{route('checkout.get',$order->id)}}" class="bt btn-dark btn-sm" style="padding: 0 3px;position: absolute;top: 29%;right: 20%;color: #fff">
                                                                    <span class="la la-money"></span> Pay</a>

                                                                <button  class="bt btn-danger btn-sm" style="padding: 0 3px;position: absolute;top: 29%;right: 14%;color: #fff" data-toggle="modal" data-target="#DeleteOrder">
                                                                    <span class="la la-trash"></span>
                                                                </button>
                                                                <div class="modal fade" id="DeleteOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                are you sure that you want to delete <b>Order</b> this step is un reversable
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary btn-xs" style="padding: 0 3px;font-size: 13px" data-dismiss="modal">Cancel</button>
                                                                                <a href="{{route('order.destroy',$order->id)}}" class="btn btn-primary btn-xs" style="padding: 0 3px;font-size: 13px" >Yes, Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        @endforeach
                                                        @if(\App\Order::where(['user_id' =>auth()->user()->id,'status' => 0])->count() == 0)
                                                            <a class="btn btn-link text-dark btn-sm bg-primary-soft mt-1 mb-1 btn-block text-left" >
                                                                There are no orders
                                                            </a>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mt-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                          <span class="badge badge-success-soft p-2 font-w-6" >
                                                             Paid Orders
                                                          </span><br>
                                                        <div class="" >
                                                            @foreach($ReadyPayments as $order)
                                                                <div style="position: relative">
                                                                    <a class="btn btn-link text-dark btn-sm bg-primary-soft mt-1 mb-1 btn-block text-left" >
                                                                <span class="badge text-danger">
                                                                    #{{$order->order_id}}
                                                                </span>
                                                                        <span class="la la-question-circle ml-2 mr-2"></span>{{$order->order->package->questions}} Questions |
                                                                        <span class="la la-clock-o  mr-2 ml-2"></span>{{$order->order->hours}} Hours
                                                                        <span class="pull-right" style="float: right">
                                                                            @if(auth()->user()->has_company == 0)
                                                                    <span class="la la-money-bill-wave-alt mr-2"></span>{{$order->order->amount}} SR
                                                                            @endif
                                                                    </span>

                                                                    </a>
                                                                    <a href="{{route('exam.start',$order->order_id)}}" class="bt btn-success btn-sm" style="padding: 0 3px;position: absolute;top: 29%;right: 20%;color: #fff">
                                                                        <span class="la la-hourglass-start"></span> Start Exam</a>
                                                                </div>

                                                            @endforeach
                                                            @if($ReadyPayments->count() == 0)
                                                                <a class="btn btn-link text-dark btn-sm bg-primary-soft mt-1 mb-1 btn-block text-left" >
                                                                    There are no orders
                                                                </a>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                                <div class="col-lg-12 mt-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                          <span class="badge badge-info-soft p-2 font-w-6" >
                                                             Finished Orders
                                                          </span><br>
                                                            <div class="" style="position: relative">
                                                                    @foreach($FinchPayments as $order)
                                                                        <div style="position: relative">
                                                                            <a class="btn btn-link text-dark btn-sm bg-primary-soft mt-1 mb-1 btn-block text-left" >
                                                                                <span class="badge text-info">
                                                                                    #{{$order->order_id}}
                                                                                </span>
                                                                                <span class="la la-question-circle ml-2 mr-2"></span>{{$order->order->package->questions}} Questions |
                                                                                <span class="la la-clock-o  mr-2 ml-2"></span>{{$order->order->hours}} Hours
                                                                                <span class="pull-right" style="float: right">
                                                                                @if(auth()->user()->has_company == 0)
                                                                                <span class="la la-money-bill-wave-alt mr-2"></span>{{$order->order->amount}} SR
                                                                                @endif
                                                                            </span>

                                                                            </a>
                                                                            <a href="{{route('exam.grades',$order->id)}}" class="bt btn-info btn-sm" style="padding: 0 3px;position: absolute;top: 29%;right: 20%;color: #fff">
                                                                                <span class="la la-certificate"></span> Grads and Certification</a>
                                                                        </div>

                                                                    @endforeach
                                                                    @if($FinchPayments->count() == 0)
                                                                        <a class="btn btn-link text-dark btn-sm bg-primary-soft mt-1 mb-1 btn-block text-left" >
                                                                            There are no orders
                                                                        </a>
                                                                    @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-4 text-center">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body" style="background: #e7effd">
                                                        <h4 class="h5 font-weight-medium">
                                                            Orders <br>
                                                            <span class="la la-shopping-cart la-2x"></span>
                                                            <span style="vertical-align: super;">{{\App\Order::where('user_id',auth()->user()->id)->count()}}</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12  pt-4">
                                                <div class="card  pull-left" style="border: 0">
                                                    <div class="card-body row" style="padding-left: 0;padding-right: 0">
                                                        <div class="col-lg-4 font-weight-medium  text-danger" >
                                                            Hang<br>
                                                            <span class="la la-shopping-cart la-2x"></span>
                                                            <span style="vertical-align: super;">{{\App\Order::where(['user_id' => auth()->user()->id,'status' => 0])->count()}}</span>
                                                        </div>


                                                        <div class="col-lg-4 font-weight-medium text-success">
                                                            Paid <br>
                                                            <span class="la la-shopping-cart la-2x"></span>
                                                            <span style="vertical-align: super;">{{$ReadyPayments->count()}}</span>
                                                        </div>


                                                        <div class="col-lg-4 font-weight-medium  text-info" >
                                                            Finch<br>
                                                            <span class="la la-shopping-cart la-2x"></span>
                                                            <span style="vertical-align: super;">{{$FinchPayments->count()}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Blog Card -->
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 mb-8">
                        <div>
                            <h2 class="mt-3">Coupons </h2>
                            <p class="lead">only lucky persons how get coupon to get the exam for free, please enter the <b>coupon code</b> and choose the package</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form action="{{route('coupon.check')}}" method="POST">
                            @csrf
                            {{method_field('POST')}}
                            <div class="row">
                                <div class="col-lg-5">
                                    <label for="package_id">Choose Package</label>
                                    <select name="package_id" id="package_id" class="form-control">
                                        @foreach($packages as $package)
                                            <option value="{{$package->id}}">{{$package->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-5">
                                    <label for="code">Enter Code</label>
                                    <input type="text" name="code" class="form-control" placeholder="Enter Code">
                                </div>
                                <div class="col-lg-2"style="margin-top: 2rem">

                                    <button class="btn btn-info btn-xs" type="submit"><i class="mr-2 la la-gift"></i>Apply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--screenshots start-->
        <section class="mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 mb-8">
                        <div>
                            <h2 class="mt-3">Packages</h2>
                            <p class="lead">choose from different packages with different number of questions and with different paid you can customize your package
                                by increase exam duration</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row align-items-center">
                    <div class="col-12 col-md-12 col-lg-12">

                        <div class="owl-carousel owl-center no-pb" data-dots="false" data-center="true" data-items="3" data-autoplay="false">
                            @foreach ($packages as $order)
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
