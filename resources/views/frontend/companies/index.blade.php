@extends('layouts.front')
<style>
    td{
        font-size: 13px;
    }
</style>
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
                                                             Up-Paid Orders
                                                        </span>
                                                            @foreach(\App\Order::where(['user_id' =>auth()->user()->id,'status' => 0])->get() as $order)
                                                               <div style="position: relative">
                                                                   <a class="btn btn-link text-dark btn-sm bg-primary-soft mt-1 mb-1 btn-block text-left" href="#">
                                                                <span class="badge text-danger">
                                                                    #{{$order->id}}
                                                                </span>
                                                                       <span class="la la-question-circle ml-2 mr-2"></span>{{$order->package->questions}} Questions |
                                                                       <span class="la la-clock-o  mr-2 ml-2"></span>{{$order->hours}} Hours
                                                                       <span class="pull-right" style="float: right">
                                                                    <span class="la la-money-bill-wave-alt mr-2"></span>{{$order->amount}} SR
                                                                </span>

                                                                   </a>
                                                                   @if($users->count() == $company->employees)
                                                                   <a href="{{route('checkout.get',$order->id)}}" class="bt btn-dark btn-sm" style="padding: 0 3px;position: absolute;top: 29%;right: 20%;color: #fff">
                                                                       <span class="la la-money"></span> Pay</a>
                                                                    @else
                                                                    <span class="alert alert-danger" style="position: absolute;top: 4%;right: 26%;font-size: 11px">
                                                                        Please add {{$company->employees}} to get payment link <a
                                                                            href="{{route('employees.create')}}"><span class="la la-plus"></span>Add</a>
                                                                    </spagn>
                                                                   @endif
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
                                                                <a class="btn btn-link text-dark btn-sm bg-primary-soft mt-1 mb-1 btn-block text-left" href="#">
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
                                                        <div class="" style="position: relative">
                                                            @foreach(\App\Order::where(['user_id' =>auth()->user()->id,'status' => 1])->get() as $order)
                                                                <a class="btn btn-link text-dark btn-sm bg-primary-soft mt-1 mb-1 btn-block text-left" href="#">
                                                                <span class="badge text-danger">
                                                                    #{{$order->id}}
                                                                </span>
                                                                    <span class="la la-question-circle ml-2 mr-2"></span>{{$order->package->questions}} Questions |
                                                                    <span class="la la-clock-o  mr-2 ml-2"></span>{{$order->hours}} Hours
                                                                    <span class="pull-right" style="float: right">
                                                                    <span class="la la-money-bill-wave-alt mr-2"></span>{{$order->amount}} SR
                                                                </span>

                                                                </a>
                                                                <a class="bt btn-success btn-sm" style="padding: 0 3px;position: absolute;top: 29%;right: 20%;color: #fff">
                                                                    <span class="la la-hourglass-start"></span> In progress</a>
                                                            @endforeach
                                                            @if(\App\Order::where(['user_id' =>auth()->user()->id,'status' => 1])->count() == 0)
                                                                <a class="btn btn-link text-dark btn-sm bg-primary-soft mt-1 mb-1 btn-block text-left" href="#">
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
                                                             Completed Orders
                                                          </span><br>
                                                            <div class="" style="position: relative">
                                                                @foreach(\App\Order::where(['user_id' =>auth()->user()->id,'status' => 2])->get() as $order)
                                                                <div class="" style="position: relative">
                                                                    <a class="btn btn-link text-dark btn-sm bg-primary-soft mt-1 mb-1 btn-block text-left" href="#">
                                                                <span class="badge text-danger">
                                                                    #{{$order->id}}
                                                                </span>
                                                                        <span class="la la-question-circle ml-2 mr-2"></span>{{$order->package->questions}} Questions |
                                                                        <span class="la la-clock-o  mr-2 ml-2"></span>{{$order->hours}} Hours
                                                                        <span class="pull-right" style="float: right">
                                                                    <span class="la la-money-bill-wave-alt mr-2"></span>{{$order->amount}} SR
                                                                </span>

                                                                    </a>
                                                                    <a href="{{route('company.users.grade',$order->id)}}" class="bt btn-info btn-sm" style="padding: 0 3px;position: absolute;top: 15%;right: 20%;color: #fff;">
                                                                        <span class="la la-certificate"></span> Grads and Certification</a>
                                                                        </div>
                                                                @endforeach
                                                                @if(\App\Order::where(['user_id' =>auth()->user()->id,'status' => 2])->count() == 0)
                                                                    <a class="btn btn-link text-dark btn-sm bg-info-soft mt-1 mb-1 btn-block text-left" href="#">
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
                                <div class="col-md-3 mt- text-center">
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
                                                            <span style="vertical-align: super;">{{\App\Order::where(['user_id' => auth()->user()->id,'status' => 1])->count()}}</span>
                                                        </div>


                                                        <div class="col-lg-4 font-weight-medium text-success">
                                                            Paid <br>
                                                            <span class="la la-shopping-cart la-2x"></span>
                                                            <span style="vertical-align: super;">{{\App\Order::where(['user_id' => auth()->user()->id,'status' => 0])->count()}}</span>
                                                        </div>


                                                        <div class="col-lg-4 font-weight-medium  text-info" >
                                                            Finch<br>
                                                            <span class="la la-shopping-cart la-2x"></span>
                                                            <span style="vertical-align: super;">{{\App\Order::where(['user_id' => auth()->user()->id,'status' => 2])->count()}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 col-lg-12 mb-8 mb-lg-0">
                        <!-- Blog Card -->
                        <div class="card border-0 shadow">
                            <div class="row no-gutters">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-body" style="position: relative">
                                              <span class="badge badge-success-soft p-2 font-w-6" >
                                                 Company Users
                                              </span>
                                                <span class="badge badge-success-soft p-2 font-w-6" style="float: right;position:absolute;right: 25px">
                                                    {{$users->count()}} / {{$company->employees}}
                                                </span>
                                                @if($users->count() != $company->employees)
                                                    <a href="{{route('employees.create')}}" class="btn pull-right btn-danger btn-sm" style="padding: 5px 10px;position: absolute;right: 80px"><span class="la la-plus pr-2"></span>Add Employee</a>
                                                @endif
                                                <div class=" mt-4">
                                                    <div class="table-responsive">
                                                        <table class=" table table-bordered table-striped">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Number</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            @foreach($users as $user)
                                                                <tr>
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td>{{$user->name}}</td>
                                                                    <td>{{$user->email}}</td>
                                                                    <td>{{$user->number}}</td>
                                                                    <td>
                                                                        <a class="btn btn-sm btn-info" style="padding: 0px 3px;" href="{{route('employees.edit',$user->id)}}"><span class="la la-edit"></span></a>
                                                                        <a class="btn btn-sm btn-danger" style="padding: 0px 3px;" data-toggle="modal" data-target="#exampleModalCenter"><span class="la la-trash" style="color: #fff"></span></a>
                                                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Employee</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <p class="text-danger">Are You sure that you want to delete employee this is not revers able</p>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" style="padding: 0 3px" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <form action="{{route('employees.destroy',$user->id)}}" class="form"
                                                                                              method="POST">
                                                                                            {{csrf_field()}}
                                                                                            {{method_field('DELETE')}}
                                                                                            <button type="submit" style="padding: 0 3px" class="btn btn-primary">Delete</button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Blog Card -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--screenshots start-->
        <section class="mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 mb-8">
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
                                                        {{$order->increase * $company->employees}}
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Price -->
                                            <div class="d-flex justify-content-center mt-5"> <span class="h3 mb-0 mt-2">SR</span>
                                                <span class="price display-3 text-danger font-w-6">{{$order->price * $company->employees}}</span>
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
