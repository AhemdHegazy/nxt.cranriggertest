@extends('layouts.front')
@section('content')
    <div class="page-content">
        <section class="position-relative">
            <div id="particles-js">
                <canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;" width="1898" height="240"></canvas></div>
            <div class="container">
                    <h1 class="mb-3">Result of Company [ {{auth()->user()->name}} ] Users</h1>
                    @foreach($grades as $InsertedGrade)
                        @if($InsertedGrade->percentage >= 70)
                         <div class="row mt-5">
                            <div class="col-12 col-lg-12 mb-8 mb-lg-0">
                                <!-- Blog Card -->
                                <div class="card border-0 shadow">
                                    <div class="row m-3">
                                        <div class="col-lg-2 text-left">
                                            <span class="la la-check-circle la-5x text-success" style="font-size: 100px"></span>
                                        </div>
                                        <div class="col-lg-6">
                                            <h4>{{$InsertedGrade->user->name}}</h4>
                                            <p class="lead">
                                                {{$InsertedGrade->user->email}}
                                            </p>
                                        </div>
                                        <div class="col-lg-3 card">
                                            <ul class="list-unstyled text-right">
                                                <li><span  style="float: left">Grade</span>{{$InsertedGrade->percentage}}</li>
                                                <li><span  style="float: left">Status</span><span class="text-success">Success</span></li>
                                            </ul>
                                            <a href="{{route('certification.print',$InsertedGrade->payment_id)}}" class="btn btn-info"><span class="la la-certificate mr-2"></span>Print Certification</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="row mt-5">
                            <div class="col-12 col-lg-12 mb-8 mb-lg-0">
                                <!-- Blog Card -->
                                <div class="card border-0 shadow">
                                    <div class="row m-3">
                                        <div class="col-lg-2 text-left">
                                        <span class="la la-times-circle la-5x text-danger" style="font-size: 100px"></span>
                                    </div>
                                     <div class="col-lg-6">
                                            <h4>{{$InsertedGrade->user->name}}</h4>
                                            <p class="lead">
                                                {{$InsertedGrade->user->email}}
                                            </p>
                                        </div>
                                    <div class="col-lg-3 card">
                                        <ul class="list-unstyled text-right">
                                            <li><span  style="float: left">Grade</span>{{$InsertedGrade->percentage}}</li>
                                            <li><span  style="float: left">Status</span><span class="text-danger">Fail</span></li>
                                        </ul>
                                        <p>Don't Stop try again</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        @endif
                
                    @endforeach
                  
                <!-- / .row -->
            </div>
            <!-- / .container -->
        </section>
        <section class="">
            <div class="container">
              
                <div class="row">
                    <div class="col-12 col-lg-12 mb-8 mb-lg-0">
                        <!-- Blog Card -->
                        <div class="card border-0 shadow">
                            <div class="row m-3">
                                    

                            </div>

                        </div>
                        <div class="mt-6">
                            <a href="{{route('company.info')}}" class="btn btn-info"><span class="la la-home mr-2"></span>Back To Profile</a>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
