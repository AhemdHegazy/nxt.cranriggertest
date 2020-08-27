

<!DOCTYPE html>
<html lang="ar">
<head>
    @include('layouts.head')
    @yield('styles')
</head>
<body class="">


<div class="page-wrapper">
@if(isset($success))
    <section class="">
        <div class="">
            <div class="">
                <div class="col-12 col-lg-12">
                    <!-- Blog Card -->
                    <div class="card border-0 shadow">
                        <div class="row m-3">
                            <div class="col-lg-3 text-left">
                                <span class="la la-check-circle la-5x text-success" style="font-size: 100px"></span>
                            </div>
                            <div class="col-lg-8">
                                <h4>Success</h4>
                                <p class="lead">Your Payment Operation Completed Successfully, You can take exam now please back to your dashboard you will find the request in paid order</p>
                         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@if(isset($fail))
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 mb-8 mb-lg-0">
                    <!-- Blog Card -->
                    <div class="card border-0 shadow">
                        <div class="row m-3">
                            <div class="col-lg-3 text-left">
                                <span class="la la-times-circle la-5x text-danger" style="font-size: 100px"></span>
                            </div>
                            <div class="col-lg-8">
                                <h4>Unfortunately</h4>
                                <p class="lead">The Payment Operation do'not achieved please try again or contact us </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
</div>
</body>

</html>

