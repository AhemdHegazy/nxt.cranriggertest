@extends('layouts.front')
@section('content')
    <div class="page-content">
        <section class="position-relative">
            <div id="particles-js">
                <canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;" width="1898" height="240"></canvas></div>
            <div class="container">
                <div class="row  text-center">
                    <div class="col">
                        <h1>Result of User {{$InsertedGrade->user->name}}</h1>
                    </div>
                </div>
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
                                    @if($InsertedGrade->percentage >= 70)
                                    <div class="col-lg-2 text-left">
                                        <span class="la la-check-circle la-5x text-success" style="font-size: 100px"></span>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4>Congratulation</h4>
                                        <p class="lead">Thank you for your creativity in passing the exam and we are proud of
                                            you.</p>
                                    </div>
                                        <div class="col-lg-3 card">
                                            <ul class="list-unstyled text-right">
                                                <li><span  style="float: left">Grade</span>{{$InsertedGrade->percentage}}</li>
                                                <li><span  style="float: left">Status</span><span class="text-success">Success</span></li>
                                                <li><span  style="float: left">User Name</span>{{$InsertedGrade->user->name}}</li>
                                            </ul>
                                            <a href="{{route('certification.print',$paymentId)}}" class="btn btn-info"><span class="la la-certificate mr-2"></span>Print Certification</a>
                                        </div>
                                    @else
                                    <div class="col-lg-2 text-left">
                                        <span class="la la-times-circle la-5x text-danger" style="font-size: 100px"></span>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4>Unfortunately</h4>
                                        <p class="lead">We're sorry you didn't pass the exam, but we believe you
                                            can get through it again, Try again and don't stop.</p>
                                    </div>
                                    <div class="col-lg-3 card">
                                        <ul class="list-unstyled text-right">
                                            <li><span  style="float: left">Grade</span>{{$InsertedGrade->percentage}}</li>
                                            <li><span  style="float: left">Status</span><span class="text-danger">Fail</span></li>
                                            <li><span  style="float: left">User Name</span>{{$InsertedGrade->user->name}}</li>
                                        </ul>
                                        <p>Don't Stop try again</p>
{{--
                                        <a href="" class="btn btn-info"><span class="la la-certificate mr-2"></span>Print Certification</a>
--}}
                                    </div>
                                    @endif

                            </div>

                        </div>
                        <div class="mt-6">
                            <a href="{{route('user.info')}}" class="btn btn-info"><span class="la la-home mr-2"></span>Back To Home</a>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
