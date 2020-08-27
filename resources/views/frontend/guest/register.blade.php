@extends('layouts.front')
@section('styles')
    <style>
        .input-file{
            position: absolute;
            top: 0;
            left: 0;
            width: 225px;
            opacity: 0;
            padding: 14px 0;
            cursor: pointer;
            background: #ddd;
        }

    </style>
@endsection
@section('content')
    <section class="position-relative">
        <div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;" width="1898" height="335"></canvas></div>
        <div class="container">
            <div class="row  text-center">
                <div class="col">
                    <h1>Sign Up</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                            <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">Account</li>
                            <li class="breadcrumb-item">Sign Up</li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">{{ucfirst($_GET['type'])}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- / .row -->
        </div>
        <!-- / .container -->
    </section>
    @if($_GET['type'] == 'organization')
        <div class="page-content">

            <!--login start-->

            <section class="register">
                <div class="container">
                        <form action="{{route('register.post')}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                                    <div class="register-form">

                                            <div class="messages"></div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input id="name" type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Company Name" required="required" data-error="company name is required.">
                                                        <div class="help-block with-errors">
                                                            @error('name')
                                                            <strong>{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input id="email" type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Company email" required="required" data-error="Email is required.">
                                                        <div class="help-block with-errors">
                                                            @error('email')
                                                            <strong>{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input id="comm_number" type="number" value="{{old('comm_number')}}" name="comm_number" class="form-control" placeholder="Commertial Number" required="required" data-error="Commertial number is required.">
                                                        <div class="help-block with-errors">
                                                            @error('comm_number')
                                                            <strong>{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input id="employees" type="number" value="{{old('employees')}}" name="employees" class="form-control" placeholder="Number of Employees Enter The Exam" required="required" data-error="number of employees is required.">
                                                        <div class="help-block with-errors">
                                                            @error('employees')
                                                            <strong>{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input id="phone" type="tel" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Phone" required="required" data-error="Phone is required">
                                                        <div class="help-block with-errors">
                                                            @error('phone')
                                                            <strong>{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <select class="form-control" id="country_id" name="country_id" required>
                                                            <option value="Country">Select Country...</option>
                                                            @foreach(DB::table('countries')->get() as $country)
                                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input id="town" type="text" value="{{old('town')}}" name="town" class="form-control" placeholder="Town">
                                                        <div class="help-block with-errors">
                                                            @error('town')
                                                            <strong>{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input id="title" type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="Title">
                                                        @error('title')
                                                        <strong>{{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input id="password" type="password" name="password" class="form-control" placeholder="Password" required="required" data-error="password is required.">
                                                        <div class="help-block with-errors">
                                                            @error('password')
                                                            <strong>{{ $message }}</strong>

                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input id="repassword" type="password" name="repassword" class="form-control" placeholder="Conform Password" required="required" data-error="Conform Password is required.">
                                                        <div class="help-block with-errors">
                                                            @error('repassword')
                                                            <strong>{{ $message }}</strong>

                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="remember-checkbox clearfix mb-5">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                                                            <label class="custom-control-label" for="customCheck1">I agree to the  <a href="{{route('guest.terms')}}">term of use and privacy policy</a></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">Create Account</button>
                                                    <span class="mt-4 d-block">Have An Account ? <a href="{{route('login.guest')}}">Sign In</a></span>
                                                </div>
                                            </div>


                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-10 ml-auto mr-auto">
                                    <div class="form-group">
                                        <img src="" id="photo" style="padding: 10px;background: #eee;width: 100%;height: auto;text-align: center">
                                        <div class="change_img">
                                            <div class="input-file-container">
                                                <input class="input-file" id="my-file" type="file" name="logo">
                                                <label tabindex="0" for="my-file" class="input-file-trigger" style="color: #fff;color: #fff;transition: all .4s;cursor: pointer;text-align: center;font-weight: 100;background: #dc3545;width: 100%;padding: 10px;"><i class="la la-upload  mr-2 d-inline-block"></i>Company Logo</label>
                                            </div>
                                            @error('logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <!-- <h4>Change image</h4> -->
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>

                </div>
            </section>
            <!--login end-->
        </div>
    @elseif($_GET['type'] == 'individual')
        <div class="page-content">
            <!--login start-->
            <section class="register">
                <div class="container text-center">
                    <form action="{{route('register.user')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                                <div class="register-form">

                                    <div class="messages"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input id="name" type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="User Name" required="required" data-error="user name is required.">
                                                <div class="help-block with-errors">
                                                    @error('name')
                                                    <strong>{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="number" type="number" value="{{old('number')}}" name="number" class="form-control" placeholder="Employee Number">
                                                <div class="help-block with-errors">
                                                    @error('number')
                                                    <strong>{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="email" type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="User email" required="required" data-error="Email is required.">
                                                <div class="help-block with-errors">
                                                    @error('email')
                                                    <strong>{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="password" type="password" name="password" class="form-control" placeholder="Password" required="required" data-error="password is required.">
                                                <div class="help-block with-errors">
                                                    @error('password')
                                                    <strong>{{ $message }}</strong>

                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="repassword" type="password" name="repassword" class="form-control" placeholder="Conform Password" required="required" data-error="Conform Password is required.">
                                                <div class="help-block with-errors">
                                                    @error('repassword')
                                                    <strong>{{ $message }}</strong>

                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="remember-checkbox clearfix mb-5">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">I agree to the  <a href="{{route('guest.terms')}}">term of use and privacy policy</a></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Create Account</button>
                                            <span class="mt-4 d-block">Have An Account ? <a href="{{route('login.guest')}}">Sign In</a></span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </section>
            <!--login end-->
        </div>
    @endif
@endsection
@section('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#photo').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#my-file").change(function() {
            readURL(this);
        });
    </script>
@endsection

