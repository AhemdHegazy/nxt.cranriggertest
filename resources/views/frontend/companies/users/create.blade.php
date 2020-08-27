@extends('layouts.front')
@section('content')
    <section class="position-relative">
        <div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;" width="1898" height="335"></canvas></div>
        <div class="container">
            <div class="row  text-center">
                <div class="col">
                    <h1>Create Employee</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                            <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">Account</li>
                            <li class="breadcrumb-item">Employee</li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Create</li>
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
        <section class="register">
            <div class="container text-center">
                <form action="{{route('employees.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-10 ml-auto mr-auto">
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="number" type="text" name="number" value="{{old('number')}}" class="form-control" placeholder="User Number" required="required" data-error="user number is required.">
                                            <div class="help-block with-errors">
                                                @error('number')
                                                <strong>{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
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
                                <input type="hidden" name="password" value="{{auth()->user()->password}}">
                                <input type="hidden" name="is_company" value="0">
                                <input type="hidden" name="company_id" value="{{auth()->user()->company_id}}">
                                <input type="hidden" name="has_company" value="1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Create Employee</button>
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
@endsection
