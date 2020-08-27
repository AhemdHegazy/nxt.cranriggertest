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
                        <span>Do you want to customize package</span>
                    </div>
                </div>
                <!-- / .row -->
            </div>
            <!-- / .container -->
        </section>
        <section>
           <div class="container">
               <div class="row">
                   <div class="col-lg-2 hidden-sm"></div>
                   <div class="col-lg-4">
                       <div class="card border-0 shadow">
                           <!-- Body -->
                           <div class="card-body py-8 px-6">
                               <!-- Badge -->
                               <div class="text-center mb-5"> <span class="badge shadow">
                                                <span class="h6 text-uppercase">Original {{$package->name}}</span>
                                          </span>
                               </div>

                               <div class="d-flex align-items-start justify-content-between">
                                   <!-- Text -->
                                   <p>Questions</p>
                                   <!-- Check -->
                                   <div class="ml-4">
                                       {{$package->questions}}
                                   </div>
                               </div>
                               <div class="d-flex align-items-start justify-content-between">
                                   <!-- Text -->
                                   <p>Hours</p>
                                   <!-- Check -->
                                   <div class="ml-4">
                                       {{$package->hours}}
                                   </div>

                               </div>
                                <div class="d-flex align-items-start justify-content-between">
                                   <!-- Text -->
                                   <p>Subject</p>
                                   <!-- Check -->
                                   <div class="ml-4">
                                       {{$package->subject->name}}
                                   </div>

                               </div>

                               <!-- Price -->
                               <div class="d-flex justify-content-center mt-5"> <span class="h3 mb-0 mt-2">SR</span>
                                   <span class="price display-3 text-danger font-w-6">
                                       {{$package->price}}
                                   </span>
                               </div>
                               <!-- Text -->
                               <div class=" text-center">
                                   <a href="{{route('order.place',$package->id)}}" class="btn btn-danger  text-white text-left mr-1"> <i class="la la-dollar-sign mr-2 ic-2x d-inline-block"></i>
                                       <div class="d-inline-block"> <small class="d-block">Order</small>
                                           Package</div>
                                   </a>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-4">
                       <div class="card border-0 shadow">

                           <!-- Body -->
                           <div class="card-body py-8 px-6">
                               <div class="text-center mb-5"> <span class="badge shadow">
                                                <span class="h6 text-uppercase">Customized {{$package->name}}</span>
                                          </span>
                               </div>
                               <div class="d-flex align-items-start justify-content-between">
                                   <!-- Text -->
                                   <p>Increase / Hour</p>
                                   <!-- Check -->
                                   <div class="ml-4">
                                       {{$package->increase}} SR / 1 Hour
                                   </div>
                               </div>
                               <div class="d-flex align-items-start justify-content-between">
                                   <!-- Text -->
                                   <p>Subject</p>
                                   <!-- Check -->
                                   <div class="ml-4">
                                                    <span class="badge badge-primary-soft ">
                                                        {{$package->subject->name}}
                                                    </span>
                                   </div>
                               </div>
                               <form action="{{route('customize.post')}}" method="POST">
                                   @csrf
                                   {{method_field('POST')}}
                                   <div class="d-flex align-items-start justify-content-between">
                                       <div class="d-flex align-items-center">
                                           <input type="hidden" name="packageId" id="packageId" value="{{$package->id}}">
                                           <input type="hidden" name="hours" id="hours" value="{{$package->hours}}">
                                           <input type="hidden" name="increase" id="increase" value="{{$package->increase}}">
                                           <input type="hidden" name="price" id="orginal" value="{{$package->price}}">
                                           <input type="hidden" name="customizedPrice" id="customizedPrice">
                                           <input class="form-control" min="{{$package->hours}}" id="product" type="text"  name="newHours" value="{{$package->hours}}" data-error="number of hours must be greater than {{$package->hours}}.">
                                           <div class="help-block with-errors">
                                           </div>
                                       </div>
                                   </div>

                                   <!-- Price -->
                                   <div class="d-flex justify-content-center mt-5"> <span class="h3 mb-0 mt-2">SR</span>
                                       <span class="price display-3 text-danger font-w-6" id="price">
                                           {{$package->price}}
                                       </span>
                                   </div>
                                   <div class="text-center">
                                       <button  type="submit" class="btn btn-dark  text-white text-left mr-1"> <i class="la la-dollar-sign mr-2 ic-2x d-inline-block"></i>
                                           <div class="d-inline-block"> <small class="d-block">Order</small>
                                               Package</div>
                                       </button>
                                   </div>
                               </form>
                               <!-- Text -->
                           </div>
                       </div>
                   </div>
               </div>

           </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script>
        $('#product').keyup(function() {
            var quantity = $("#product").val();
            var iPrice = $("#orginal").val();
            var increase = $("#increase").val();
            var hours = $("#hours").val();
            if(quantity != hours && quantity != ''){
                var total = (increase * (quantity-1))+parseInt(iPrice);
            }else{
                var total = iPrice;
            }
            $("#price").html(total); // sets the total price input to the quantity * price
            $("#customizedPrice").val(total); // sets the total price input to the quantity * price
            $("#orginal").val(total); // sets the total price input to the quantity * price
            $("#hours").val(quantity); // sets the total price input to the quantity * price
        });
    </script>
@endsection
