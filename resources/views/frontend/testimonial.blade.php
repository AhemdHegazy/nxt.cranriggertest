@extends('layouts.front')
@section('content')
    <div class="page-content">
        <section class="position-relative">
            <div id="particles-js">
                <canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;" width="1898" height="240"></canvas></div>
            <div class="container">
                <div class="row  text-center">
                    <div class="col">
                        <h1>Please Write Some thing</h1>
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
                                <div class="col-lg-2 text-left">
                                    <span class="la la-handshake-o la-5x text-success" style="font-size: 100px"></span>
                                </div>
                                <div class="col-lg-10 mt-5">
                                    <h4>Leave Testimonials</h4>
                                    <p class="lead">What is your imprison about us!</p>
                                </div>
                                <div class="col-lg-12">
                                    <form class="row" method="post" action="{{route('testimonial.post')}}" novalidate="true">
                                        @csrf
                                        {{method_field('POST')}}
                                        <div class="form-group col-md-12">
                                            <textarea id="message" name="message" class="form-control" placeholder="Content" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group col-lg-4  mt-4">
                                            <select class="form-control" name="stars">
                                                <option style="color: #0b2e13" value="1">Positive</option>
                                                <option style="color: #ac2925" value="0">Negative</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                        <div class="col-lg-4 text-center mt-4">
                                            <button type="submit" class="btn btn-primary"><span>Send Testimonials</span>
                                            </button>
                                        </div>

                                    </form>
                                </div>
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
