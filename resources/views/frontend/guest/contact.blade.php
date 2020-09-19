@extends('layouts.front')
@section('content')

    <section class="position-relative" style="padding-bottom: 0">
        <div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;" width="1898" height="335"></canvas></div>
        <div class="container">
            <div class="row  text-center">
                <div class="col">
                    <h1>Contact Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                            <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active text-danger" aria-current="page">Contact Us</li>
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
                <div class="row">
                    @if (\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success col-lg-12">
                            We Will contact you on mail thanks

                        </div>
                    @endif
                </div>
                <div class="row justify-content-center mb-5 text-center">
                    <div class="col-12 col-lg-8">
                        <div>
                            <img src="{{asset('logo-color.png')}}" alt="" width="">
                            <h2 class="mt-4 mb-0">Contact Us</h2>
                            <p class="lead mb-0">Get in touch and let us know how we can help. Fill out the form and we’ll be in touch as soon as possible.</p>

                        </div>
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-12 col-lg-10">
                        <form class="row" method="post" action="{{route('contacts.post')}}" novalidate="true">
                            @csrf
                            {{method_field('POST')}}
                            <div class="messages"></div>
                            <div class="form-group col-md-6">
                                <input id="name" type="text" name="name" class="form-control" placeholder="Full Name" required="required" data-error="Name is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <input id="form_email" type="email" name="email" class="form-control" placeholder="Email" required="required" data-error="Valid email is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control" name="type">
                                    <option>- Select Service</option>
                                    <option>Problem</option>
                                    <option>Advice</option>
                                    <option>Suggestion</option>
                                    <option>Message</option>
                                    <option>Order</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input id="subject" type="text" name="subject" class="form-control" placeholder="Subject" required="required" data-error="Subject is required">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea id="form_message" name="message" class="form-control" placeholder="Message" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 text-center mt-4">
                                <button class="btn btn-danger" type="submit"><span>Send Messages</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>



    </div>
@endsection
