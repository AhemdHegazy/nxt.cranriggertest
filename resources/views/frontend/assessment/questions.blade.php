@extends('layouts.front')
@section('styles')
    <style>
        .inputGroup {
            background-color: #fff;
            display: block;
            margin: 10px 0;
            position: relative;
        }
        .inputGroup label {
            padding: 12px 30px;
            width: 100%;
            display: block;
            text-align: left;
            color: #3c454c;
            cursor: pointer;
            position: relative;
            z-index: 2;
            transition: color 200ms ease-in;
            overflow: hidden;
        }
        .inputGroup label:before {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            content: '';
            background-color: #de3545;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%) scale3d(1, 1, 1);
            transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 0;
            z-index: -1;
        }
        .inputGroup label:after {
            width: 32px;
            height: 32px;
            content: '';
            border: 2px solid #d1d7dc;
            background-color: #fff;
            background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
            background-repeat: no-repeat;
            background-position: 2px 3px;
            border-radius: 50%;
            z-index: 2;
            position: absolute;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            transition: all 200ms ease-in;
        }
        .inputGroup input:checked ~ label {
            color: #fff;
        }
        .inputGroup input:checked ~ label:before {
            transform: translate(-50%, -50%) scale3d(56, 56, 1);
            opacity: 1;
        }
        .inputGroup input:checked ~ label:after {
            background-color: #ff929d;
            border-color: #ff929d;
        }
        .inputGroup input {
            width: 32px;
            height: 32px;
            order: 1;
            z-index: 2;
            position: absolute;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            visibility: hidden;
        }
        .form {
            padding: 0 16px;
            max-width: 550px;
            margin: 50px auto;
            font-size: 18px;
            font-weight: 600;
            line-height: 36px;
        }
    </style>

@endsection
@section('content')
    <div class="page-content">
        <form action="{{route('exam.store')}}" method="post">
            @csrf
            <input type="hidden" name="order_id" value="{{$order->id}}">
            <input type="hidden" name="payment_id" value="{{$payment->id}}">
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            <section class="">
                <div class="container">
                    @foreach($questions as $question)
                        <div class="row p-4 mt-2" style="background: #eee">
                            <h4 class="col-lg-12" style="font-size: 16px;color: #de3545">Question  {{request('page') ?? $loop->iteration}} </h4>
                            @if($question->image != null)

                                <div class="col-lg-12 ">
                                    <p>{!! $question->question !!}</p>

                                </div>

                                <div class="col-lg-12">
                                    <a href="" data-toggle="modal" id="hover" data-target="#exampleModal{{$question->id}}">
                                        <img src="{{asset($question->image)}}" alt="" class="img-fluid img-thumbnail">
                                    </a>

                                    <div class="modal fade" id="exampleModal{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document" style="position: relative">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: #ddd;padding: 2px 8px;border-radius: 50%;position: absolute;z-index: 999;right: -13px;top: -17px;">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <div class="modal-content">



                                                <img src="{{asset($question->image)}}" alt="" class="img-fluid img-thumbnail">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @else
                                <div class="col-lg-12 ">
                                    <p>{!! $question->question !!}</p>

                                </div>
                            @endif
                            @foreach($question->options as $option)
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="inputGroup">
                                        <input id="{{$option->id}}" name="{{$question->id}}" value="{{$option->id}}" type="radio" required>
                                        <label for="{{$option->id}}">{{$option->option}}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </section>

            <div class="container">

                <div class="row">
                    <div class="col-lg-6 pull-left">
                        <div id="DateCountdown" data-date="{{$payment->start_date}}" style="z-index:999;width: 500px; height: 125px; padding: 0px; box-sizing: border-box;"></div>
                        <div>
                            <div id="PageOpenTimer" style="width: 500px; height: 20px; float: left"></div>
                        </div>

                    </div>
                    @if($questions->hasMorePages())
                        <input type="hidden" name="nextpage" value="{{URL::current().substr($questions->nextPageUrl(),1)}}">
                        <div class="col-lg-6  pull-right text-right mt-3">
                            <button type="submit" class="btn btn-dark  text-white text-left mr-2"> <i class="la la-chevron-right mr-2 ic-2x d-inline-block"></i>
                                <div class="d-inline-block"> <small class="d-block">Next</small>
                                    Page</div>
                            </button>
                        </div>
                    @else
                        <div class="col-lg-6  pull-right text-right mt-3">
                            <button type="submit" class="btn btn-dark  text-white text-left mr-2"> <i class="la la-chevron-right mr-2 ic-2x d-inline-block"></i>
                                <div class="d-inline-block"> <small class="d-block">Finch</small>
                                    Exam</div>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
    <meta http-equiv="refresh" content="{{$payment->start_date}};url={{route('exam.grades',$payment->id)}}" />

@endsection
@section('scripts')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('inc/TimeCircles.js')}}"></script>
    <link rel="stylesheet" href="{{asset('inc/TimeCircles.css')}}" />
    <script>

        $("#DateCountdown").TimeCircles({
            "animation": "smooth",
            "bg_width": 0.9,
            "fg_width": 0.03666666666666667,
            "circle_bg_color": "#ddd",
            "time": {
                "Days": {
                    "text": "Days",
                    "color": "#ddd",
                    "show": false
                },
                "Hours": {
                    "text": "Hours",
                    "color": "#f2ae2b",
                    "show": true
                },
                "Minutes": {
                    "text": "Minutes",
                    "color": "#f2ae2b",
                    "show": true
                },
                "Seconds": {
                    "text": "Seconds",
                    "color": "#f2ae2b",
                    "show": true
                }
            }
        });
        var updateTime = function(){
            var date = $("#date").val();
            var time = $("#time").val();
            var datetime = date + ' ' + time + ':00';
            $("#DateCountdown").data('date', datetime).TimeCircles().start();
        }
        $("#date").change(updateTime).keyup(updateTime);
        $("#time").change(updateTime).keyup(updateTime);


        // Fade in and fade out are examples of how chaining can be done with TimeCircles
        $(".fadeIn").click(function() {
            $("#DateCountdown").fadeToggle();
        });


    </script>
@endsection
