@extends('layouts.front')
@section('content')
    <section class="position-relative">
        <div id="particles-js">
            <canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;" width="1898"
                    height="335"></canvas>
        </div>
        <div class="container">
            <div class="row  text-center">
                <div class="col">
                    <h1>Product Checkout</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                            <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">Checkout</li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Order Deatiles</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- / .row -->
        </div>
        <!-- / .container -->
    </section>
    <section>
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-12">

                    <div class="">
                        <div class="p-3 p-lg-5 border">
                            <h3 class="mb-5"><b>Your Order</b> </h3>
                            <ul class="list-unstyled">
                                <li class="mb-3 border-bottom pb-3"><span> User Name </span><span
                                        style="float: right">{{auth()->user()->name}}</span></li>
                                <li class="mb-3 border-bottom pb-3"><span> User Type </span><span
                                        style="float: right">{{auth()->user()->is_company == 1 ? 'Company' : 'Individual'}}</span></li>
                                <li class="mb-3 border-bottom pb-3"><span> Package Name </span><span
                                        style="float: right">{{$order->package->name}}</span></li>
                                <li class="mb-3 border-bottom pb-3"><span> Question Count </span><span
                                        style="float: right">{{$order->package->questions}}</span></li>
                                <li class="mb-3 border-bottom pb-3"><span> Subject Name </span><span
                                        style="float: right">{{$order->package->subject->name}}</span></li>
                                <li class="mb-3 border-bottom pb-3"><span> Hours </span> <span
                                        style="float: right">{{$order->hours}} </span></li>
                                <li style="padding-top:50px"><span style="font-size:25px"><strong class="cart-total"> Total Amount:</strong></span> <span
                                        style="float: right;font-size:25px"> <strong class="cart-total"
                                                                      id="price">{{$order->amount}}</strong> SR</span>
                                </li>
                                <li style="padding-top:50px">
                                    <a href="{{route('user.info')}}" class="btn btn-success">Back To Profile Page</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="">
                        @if(App\Payment::where('order_id',$order->id)->count() == 0)
                        <div class=" border">
                            <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <style>
        .PT_express_checkout {
            height: 550px;
        }

        .result {
            display: none;
        }

        .result.success {
            background-color: green;
        }

        .result.failed {
            background-color: red;
        }
        .popup-wrap {
    text-align: center;
    margin: 0 auto;
    box-shadow: 1px 1px 5px 4px rgba(100, 100, 100, 0.2);
    position: relative;
    z-index: 10;
    font-size: 14px;
    line-height: 1.428571429;
    color: #333333;
    background-color: #fff;
}
#PT_overlay {
    position: fixed;
    top: 0;
    left: 0;
    background: transparent;
    z-index: 9996;
    width: 100%;
    height: 100%;
    display: block;
}
    </style>
    <script>
        const credintials = {
            merchant_id: "10065409",
            secret_key: "6ijsFxVnzUB2ztaUzUNWsppbrvBQBqaHJtap05MA0oDzRNuqIinbHNm8iYZUp9B9DLyERleRJRrBFW2oepzWdW5vU4pjd1sRN1vE",
        };
    </script>
    <div class="result success">Payment successed</div>
    <div class="result failed">Payment failed</div>

    <div>
        <link rel="stylesheet" href="https://www.paytabs.com/theme/express_checkout/css/express.css">
        <script src="https://www.paytabs.com/theme/express_checkout/js/jquery-1.11.1.min.js"></script>
        <script src="https://www.paytabs.com/express/express_checkout_v3.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Button Code for PayTabs Express Checkout -->
        <div class="PT_express_checkout"></div>
        <script type="text/javascript">
            Paytabs("#express_checkout").expresscheckout({
                settings: {
                    ...credintials,
                    amount: {{$order->amount}},
                    currency: "SAR",
                    type: "User",
                    title: "Crane & Rigger Exam",
                    product_names: "Crane & Rigger Exam",
                    order_id: {{$order->id}},
                    url_redirect: "http://craneriggertest.com/callback",
                    display_customer_info: 0,
                    display_billing_fields: 1,
                    display_shipping_fields: 0,
                    language: "en",
                    redirect_on_reject: 1,
                    is_iframe: {
                        load: "onbodyload",
                        show: 1
                    },
                    is_self: 1,
                    url_cancel: "http://craneriggertest.com/callback"
                },
                 customer_info: {
                    first_name: "",
                    last_name: "",
                    phone_number: "5486253",
                    email_address: "john@test.com",
                    country_code: "973"
                },
                billing_address: {
                    full_address: "saudi arabia ",
                    city: "saudi arabia ",
                    state: "saudi arabia ",
                    country: "SAU",
                    postal_code: "00973"
                },
                shipping_address: {
                    shipping_first_name: "Jane",
                    shipping_last_name: "Abdulla",
                    full_address_shipping: "Manama, Bahrain",
                    city_shipping: "Manama",
                    state_shipping: "Manama",
                    country_shipping: "BHR",
                    postal_code_shipping: "00973"
                },

            });
        </script>

        <script>

            let pt_checker = setInterval(start, 3000);

            function start() {
                $.get('/ec/notify/check.php', (data, status) => {
                    if (data != '0') {
                        let json = JSON.parse(data);
                        let success = json.response_code == 100;

                        alert('Payment status: ' + json.response_message);


                        if (success) {
                            $('.success').show('fast');
                        } else {
                            $('.failed').show('fast');
                        }

                        console.log(json);
                        clearInterval(pt_checker);
                    } else {
                        console.log('.');
                    }
                });
            }
        </script>
    </div>
</body>

</html>
                        </div>
                        @else
                         <section class="">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-lg-12 mb-8 mb-lg-0">
                                        <!-- Blog Card -->
                                        <div class="card border-0 shadow">
                                            <div class="row m-3">
                                                <div class="col-lg-3 text-left">
                                                    <span class="la la-check-circle la-5x text-success" style="font-size: 100px"></span>
                                                </div>
                                                <div class="col-lg-8">
                                                    <h4>Success</h4>
                                                    <p class="lead">Your Payment Operation Completed Successfully, You can take exam now please back to your dashboard you will find the request in paid order</p>
                                                    <a data-toggle="modal" data-target="#exampleModal" class="btn btn-block btn-primary mt-5">
                                                        <span class="la la-star mr-3"></span>Start Exam
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Start Exam Verification</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are You sure that you want to start the exam you will count down of <span class="badge badge-info">
                        {{$order->package->hours}} Hours
                    </span> and if you close the application this is not reversible
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal" style="padding: 3px 5px;font-size: 14px">No Close</button>
                        <a href="{{route('exam.begin',$order->id)}}" class="btn btn-primary btn-xs" style="padding: 3px 5px;font-size: 14px">Yes, Start now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')

    <script>
    $('.header-wrap .title').html="Cran Test";
        $(document).on('click', '#checkout', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'get',
                url: "{{route('offers.checkout')}}",
                data: {
                    price: $('#price').text(),
                    offer_id: '{{$order -> id}}',
                },
                success: function (data) {
                    if (data.status == true) {
                        $('#showPayForm').empty().html(data.content);
                    } else {
                    }
                }, error: function (reject) {
                }
            });
        });
    </script>
@stop
