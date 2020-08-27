@extends('layouts.front')
@section('content')
    <div class="page-content">
        <section class="position-relative">
            <div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;" width="1898" height="335"></canvas></div>
            <div class="container">
                <div class="row  text-center">
                    <div class="col">
                        <h1>About Us</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                                <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">Pages</li>
                                <li class="breadcrumb-item">Company</li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- / .row -->
            </div>
            <!-- / .container -->
        </section>
        <section class="pb-11">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 col-lg-6 mb-6 mb-lg-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="assets/images/hero/05.png" class="img-fluid rounded shadow-lg" alt="...">
                            </div>
                            <div class="col-6">
                                <img src="assets/images/blog/01.png" class="img-fluid rounded shadow-lg mb-5" alt="...">
                                <img src="{{asset('logo-color.png')}}" class="img-fluid rounded shadow-lg" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-5">
                        <div> <span class="badge badge-primary-soft p-2 font-w-6">
                  About Bootsland
              </span>
                            <h2 class="mt-3 font-w-5">Bootsland Small Tean Crafting Beautiful Experience</h2>
                            <p class="lead">We use the latest technologies it voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                            <p class="mb-0">We use the latest technologies it voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-4 mb-8 mb-lg-0">
                        <div class="px-4 py-7 rounded hover-translate text-center bg-white shadow">
                            <div>
                                <img class="img-fluid" src="assets/images/svg/01.svg" alt="">
                            </div>
                            <h5 class="mt-4 mb-3">Web Development</h5>
                            <p>Serspiciatis unde omnis iste natus error sit doloremque laudantium, totam rem aperiam.</p>
                            <button type="button" class="btn btn-link text-danger p-0">Read Details</button>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-sm-6">
                        <div class="px-4 py-7 rounded hover-translate text-center bg-white shadow">
                            <div>
                                <img class="img-fluid" src="assets/images/svg/02.svg" alt="">
                            </div>
                            <h5 class="mt-4 mb-3">Flexibility</h5>
                            <p>Serspiciatis unde omnis iste natus error sit doloremque laudantium, totam rem aperiam.</p>
                            <button type="button" class="btn btn-link text-danger p-0">Read Details</button>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-sm-6 mt-6 mt-sm-0">
                        <div class="px-4 py-7 rounded hover-translate text-center bg-white shadow">
                            <div>
                                <img class="img-fluid" src="assets/images/svg/03.svg" alt="">
                            </div>
                            <h5 class="mt-4 mb-3">Easy Code</h5>
                            <p>Serspiciatis unde omnis iste natus error sit doloremque laudantium, totam rem aperiam.</p>
                            <button type="button" class="btn btn-link text-danger p-0">Read Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
