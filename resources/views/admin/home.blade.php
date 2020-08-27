@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card__header">
        </div>
        <div class="card__body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-3 text-center">
                            <div class="card shadow" style="background: #22313a">
                                <div class="card__header" style="background: #131d22;padding-bottom: 5px">
                                    <span class="fa fa-align-justify fa-2x"></span>
                                    <h4>Subjects</h4>
                                </div>
                                <div class="card__body">
                                    <h1>{{\App\Subject::count()}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center">
                            <div class="card shadow" style="background: #22313a">
                                <div class="card__header" style="background: #131d22;padding-bottom: 5px">
                                    <span class="fa fa-question-circle fa-2x"></span>
                                    <h4>Questions</h4>
                                </div>
                                <div class="card__body">
                                    <h1>{{\App\Question::count()}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center">
                            <div class="card shadow" style="background: #22313a">
                                <div class="card__header" style="background: #131d22;padding-bottom: 5px">
                                    <span class="fa fa-th-large fa-2x"></span>
                                    <h4>Packages</h4>
                                </div>
                                <div class="card__body">
                                    <h1>{{\App\Package::count()}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center">
                            <div class="card shadow" style="background: #22313a">
                                <div class="card__header" style="background: #131d22;padding-bottom: 5px">
                                    <span class="fa fa-users fa-2x"></span>
                                    <h4>Users</h4>
                                </div>
                                <div class="card__body">
                                    <h1>{{\App\User::count()}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center">
                            <div class="card shadow" style="background: #22313a">
                                <div class="card__header" style="background: #131d22;padding-bottom: 5px">
                                    <span class="fa fa-laptop fa-2x"></span>
                                    <h4>Posts</h4>
                                </div>
                                <div class="card__body">
                                    <h1>{{\App\Post::count()}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center">
                            <div class="card shadow" style="background: #22313a">
                                <div class="card__header" style="background: #131d22;padding-bottom: 5px">
                                    <span class="fa fa-align-justify fa-2x"></span>
                                    <h4>Orders</h4>
                                </div>
                                <div class="card__body">
                                    <h1>{{\App\Order::count()}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center">
                            <div class="card shadow" style="background: #22313a">
                                <div class="card__header" style="background: #131d22;padding-bottom: 5px">
                                    <span class="fa fa-globe fa-2x"></span>
                                    <h4>Companies</h4>
                                </div>
                                <div class="card__body">
                                    <h1>{{\App\Company::count()}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center">
                            <div class="card shadow" style="background: #22313a">
                                <div class="card__header" style="background: #131d22;padding-bottom: 5px">
                                    <span class="fa fa-mouse-pointer fa-2x"></span>
                                    <h4>Coupons</h4>
                                </div>
                                <div class="card__body">
                                    <h1>{{\App\Coupon::count()}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <img src="{{asset('doc/parcode.jpeg')}}" alt="" class="img-responsive img-thumbnail" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.9), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">

                    <img src="{{asset('doc/logo.jpeg')}}" alt="" class="img-fluid img-responsive img-thumbnail img-thumbnail" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.9), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                    <h3>Name: Saeed Abdullah Alamri</h3>
                    <div>
                        <h5>E-mail:abo-eyas31@hotmail.com</h5>
                        <h5>Mobile :0508495004 <br><br>
                        Mobile :0507079668 </h5>
                        Saudi Arabia /
                        Eastern Region,Dammam <br>
                        <b>All rights reserved for Saeed Commercial Brokerage</b>
                    </div>
                    <a href="{{asset('doc/parcode2.jpeg')}}" target="_blank" class="btn btn-danger" style="margin-top: 1rem">Freelance document</a>

                </div>
            </div>
        </div>
    </div>
@endsection
