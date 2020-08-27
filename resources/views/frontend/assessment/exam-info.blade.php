@extends('layouts.front')
@section('content')
    <div class="page-content">
        <section class="position-relative">
            <div id="particles-js">
                <canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;" width="1898" height="240"></canvas></div>
            <div class="container">
                <div class="row  text-center">
                    <div class="col">
                        <h1>Welcome in Crane rigger test</h1>
                    </div>
                </div>
                <!-- / .row -->
            </div>
            <!-- / .container -->
        </section>
        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 mb-8 mb-lg-0">
                        <!-- Blog Card -->
                        <div class="card border-0 shadow">
                            <div class="row no-gutters">
                                <div class="col-md-12">
                                    <div class="card-body" style="position:relative;">
                                        <h5 class="mt-4 font-w-5" style="position: absolute;left: 8%">Exam Information</h5>
                                        <img class="card-img-top shadow rounded" src="{{asset('assets/images/portfolio/01.jpg')}}" alt="Image">
                                        <div class="d-flex mt-6 align-items-start justify-content-between">
                                            <!-- Text -->
                                            <p>Exam Period</p>
                                            <!-- Check -->
                                            <div class="ml-4">
                                                {{$order->hours}} Hour
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start justify-content-between">
                                            <!-- Text -->
                                            <p>Exam Number Of Questions</p>
                                            <!-- Check -->
                                            <div class="ml-4">
                                                {{$order->package->questions}}
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start justify-content-between">
                                            <!-- Text -->
                                            <p>Registration Type</p>
                                            <!-- Check -->
                                            <div class="ml-4">
                                                {{$order->user->is_company == 1 ? 'Company' : 'Individual'}}
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start justify-content-between">
                                            <!-- Text -->
                                            <p>Exam Paid Price</p>
                                            <!-- Check -->
                                            <div class="ml-4">
                                                {{$order->amount}} SR
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start justify-content-between">
                                            <!-- Text -->
                                            <p>Exam Package Name</p>
                                            <!-- Check -->
                                            <div class="ml-4">
                                                {{$order->package->name}}
                                            </div>
                                        </div>
                                            <a data-toggle="modal" data-target="#exampleModal" class="btn btn-block btn-primary mt-5">
                                                <span class="la la-star mr-3"></span>Start Exam
                                            </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mb-8 mb-lg-0">
                        <!-- Blog Card -->
                        <div class="card border-0 shadow">
                            <div class="row no-gutters">
                                <div class="col-md-12">
                                    <div class="card-body" style="position: relative">
                                        <h5 class="mt-3 font-w-5" style="position: absolute;left: 8%">Guidelines</h5>
                                        <img class="card-img-top shadow rounded" src="{{asset('assets/images/portfolio/06.jpg')}}" alt="Image">

                                        <div id="accordion" class="accordion" style="padding-top: 14px;">
                                            @foreach($guidelines as $guideline)
                                                <div class="card border-0 active mb-2">
                                                    <div class="card-header border mb-0 bg-transparent">
                                                        <h6 class="mb-0">
                                                            <a class="text-dark collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$guideline->id}}" aria-expanded="false">
                                                                {{$guideline->title}}</a>
                                                        </h6>
                                                    </div>
                                                    <div id="collapse{{$guideline->id}}" class="collapse" data-parent="#accordion" style="">
                                                        <div class="card-body text-muted">
                                                            {{$guideline->description}}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Start Exam Verification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  Are You sure that you want to start the exam you will count down of <span class="badge badge-info">
                        {{$order->package->hours}} Hours
                    </span> and if you close the application this is not reversible
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal" style="padding: 3px 5px;font-size: 14px">No Close</button>
                    <a href="{{route('exam.begin',$order->id)}}" class="btn btn-primary btn-xs" style="padding: 3px 5px;font-size: 14px">Yes, Start now</a>
                </div>
            </div>
        </div>
    </div>
@endsection
