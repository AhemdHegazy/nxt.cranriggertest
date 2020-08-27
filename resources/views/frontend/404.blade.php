<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="bootstrap 4, premium, multipurpose, sass, scss, saas" />
    <meta name="description" content="Bootstrap 4 Landing Page Template" />
    <meta name="author" content="heavy equipment" />
    <meta name="author" content="heavy equipment" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Heavy Equipment - Test</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />
    <!-- inject css start -->
    <link href="{{asset('assets/css/theme-plugin.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/theme.min.css')}}" rel="stylesheet" />
    <!-- inject css end -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
</head>
<body>
    <div class="page-wrapper">
        <div class="page-content">

            <!--404 start-->

            <section class="fullscreen-banner p-0" style="height: 722px;">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-12 text-center h-100 d-flex align-items-center">
                            <div class="w-100" style="font-size: 180px;line-height: 100px">
                                4<img class="img-fluid d-inline mb-5" src="assets/images/404.gif" alt="" style="width: 10%">4
                                <h2>Oops! Page Not Found</h2>
                                <div class="col-lg-6 col-md-10 ml-auto mr-auto">
                                    <h6>You’re either misspelling the URL
                                        or requesting a page that's no longer here.</h6>
                                    <a class="btn btn-primary" href="{{route('index')}}">Back To Home Page</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--404 end-->

        </div>
    </div>
    <script src="{{asset('assets/js/theme-plugin.js')}}"></script>
    <script src="{{asset('assets/themejs/-script.js')}}"></script>
</body>
</html>
