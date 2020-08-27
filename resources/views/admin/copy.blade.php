@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card__header">
        </div>
        <div class="card__body">
            <div class="row">
                <div class="col-lg-4">
                    <img src="{{asset('doc/parcode.jpeg')}}" alt="" class="img-responsive img-thumbnail" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.9), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('doc/logo.jpeg')}}" alt="" class="img-fluid img-responsive" style="border-bottom:13px solid #fff;">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <h4>
                        <b>All rights reserved for Saeed Commercial Brokerage</b>
                    </h4>
                    <a href="{{asset('doc/parcode2.jpeg')}}" target="_blank" class="btn btn-danger" style="margin-top: 1rem">Freelance document</a>
                </div>
                <div class="col-lg-4">
                    <h4>E-mail  / abo-eyas31@hotmail.com</h4>
                    <h5>Mobile  / 0508495004 <br><br>
                        Mobile  / 0507079668
                        <br>
                           Address /  Saudi Arabia -
                            Eastern Region,Dammam
                    </h5>
                </div>

            </div>
        </div>
    </div>
@endsection
