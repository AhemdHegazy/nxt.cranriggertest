<!DOCTYPE html>
<html lang="en">
<!--[if IE 9 ]><html class="ie9"><![endif]-->

<!-- Mirrored from bootstrapsale.com/projects/maed/v1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Oct 2018 08:47:17 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('backend/favicon.ico') }}">

    <title>Material Admin</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- dataTables --}}
    <link href="{{ asset('backend/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/buttons.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{asset('backend/vendors/bower_components/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/css/summernote.css')}}" type="text/css">


    {{-- SweetAlert2 --}}
    <script src="{{ asset('backend/js/sweetalert2.min.js') }}"></script>
    <link href="{{ asset('backend/css/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('backend/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('backend/css/navbar-fixed-top.css') }}" rel="stylesheet">
    <script src="{{ asset('backend/js/ie-emulation-modes-warning.js') }}"></script>
    <link href="{{asset('backend/css/app-1.min.css')}}" rel="stylesheet">

</head>
<body>
<div class="login">
    <form method="POST" action="{{ route('admin.login') }}" class="col-lg-push-4 col-lg-4">
    @csrf
    <!-- Login -->
    <div class="login__block toggled" id="l-login">
        <div class="login__block__header">
            <i class="zmdi zmdi-account-circle"></i>
            <h2>ADMIN LOGIN</h2>
        </div>

        <div class="login__block__body">
            <div class="form-group form-group--float form-group--centered form-group--centered">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                <label>Email Address</label>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
                <i class="form-group__bar"></i>
            </div>

            <div class="form-group form-group--float form-group--centered form-group--centered">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                <label>Password</label>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                @endif
                <i class="form-group__bar"></i>
            </div>

            <button class="btn btn--light btn--icon m-t-15"><i class="zmdi zmdi-long-arrow-right"></i></button>
        </div>
    </div>
    </form>
</div>

<script src="{{asset('backend/vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('backend/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
{{-- dataTables --}}
<script src="{{ asset('backend/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/js/dataTables.bootstrap.min.js') }}"></script>

<script src="{{ asset('backend/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/buttons/jszip.min.js') }}"></script>
<script src="{{ asset('backend/buttons/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/buttons/vfs_fonts.js') }}"></script>

{{-- Validator --}}
<script src="{{ asset('backend/js/validator.min.js') }}"></script>
<script src="{{ asset('backend/vendors/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('backend/vendors/fileinput/fileinput.min.js') }}"></script>
<script src="{{asset('backend/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('backend/js/app.min.js')}}"></script>
</body>
</html>
