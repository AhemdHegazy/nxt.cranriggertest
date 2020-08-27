@extends('layouts.front')
@section('content')
    <section class="position-relative">
        <div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;" width="1898" height="335"></canvas></div>
        <div class="container">
            <div class="row  text-center">
                <div class="col">
                    <h1>Register Type</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                            <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">Register</li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Type</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- / .row -->
        </div>
        <!-- / .container -->
    </section>
    <div class="page-content">
        <section>
            <div class="container">
                <!-- / .row -->
                <div class="row">

                    <div class="col-xl-6 col-lg-6 col-sm-12">
                        <div class="px-4 py-7 rounded hover-translate bg-white shadow">
                            <h5 class="mb-3 text-center">Individuals</h5>
                            <div class="row">
                                <div class="col-lg-4">
                                    <img class="img-fluid" src="{{asset('assets/images/svg/02.svg')}}" alt="">
                                </div>
                                <div class="col-lg-8">

                                    <p>This registration type for single users that doesn't take this exam for a company.</p>
                                    <a href="{{route('register.guest')}}?type=individual" class="btn btn-danger text-white">Registration Form</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-12">
                        <div class="px-4 py-7 rounded hover-translate bg-white shadow">
                            <h5 class="mb-3 text-center">Organizations</h5>
                            <div class="row">
                                <div class="col-lg-4">
                                    <img class="img-fluid" src="{{asset('assets/images/svg/01.svg')}}" alt="">
                                </div>
                                <div class="col-lg-8">

                                    <p>If you are a company have many users that you want them to take our exam then register here.</p>
                                    <a href="{{route('register.guest')}}?type=organization" class="btn btn-danger text-white">Registration Form</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
