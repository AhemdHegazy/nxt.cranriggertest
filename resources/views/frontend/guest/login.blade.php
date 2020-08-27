@extends('layouts.front')
@section('content')
    <section class="position-relative">
        <div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;" width="1898" height="335"></canvas></div>
        <div class="container">
            <div class="row  text-center">
                <div class="col">
                    <h1>Login</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                            <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">Account</li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Login</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- / .row -->
        </div>
        <!-- / .container -->
    </section>
    <div class="page-content">

        <!--login start-->

        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-5">
                        <div>
                            <h2 class="text-center mb-3">Sign In</h2>
                            <form action="{{route('login.guest')}}" method="POST">
                                @csrf
                                <div class="messages"></div>
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input name="email" type="text"  value="{{old('email')}}"  class="form-control" placeholder="Email " required="required" data-error="Email is required.">
                                    <div class="help-block with-errors">
                                        @error('email')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" type="password" name="password" class="form-control" placeholder="Password" required="required" data-error="password is required.">
                                    <div class="help-block with-errors">
                                        @error('password')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mt-4 mb-5">
                                    <div class="remember-checkbox d-flex align-items-center justify-content-between">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                        </div>
                                        <a href="#"  class="text-danger">Forgot Password?</a>
                                    </div>
                                </div>
                                <input type="submit" name="submit" class="btn btn-block btn-warning" value="Login Now" style="background:#f94f15;color: #fff">
                            </form>
                            <div class="d-flex align-items-center text-center justify-content-center mt-4">
                                <span class="text-muted mr-1">Don't have an account?</span>
                                <a href="{{route('register.type')}}" class="text-danger">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--login end-->
    </div>

@endsection

