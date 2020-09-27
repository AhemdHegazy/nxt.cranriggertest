@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card__header">
                    @if(App\Payment::count() > 0)
                    <form action="{{route('payments.query')}}" method="POST">
                        @csrf
                        {{method_field('POST')}}
                        <div class="col-lg-3">
                            <label>Year</label>
                            <select name="year" id="year" class="form-control">

                                @for($i= date('Y',strtotime(\App\Payment::orderBy('created_at')->first()->created_at));$i<=date('Y',strtotime(\Carbon\Carbon::now()));$i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Month</label>
                            <select name="month" id="month" class="form-control">
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Subject</label>
                            <select name="subject_id" id="subject_id" class="form-control">
                                <option value="0">All Subjects</option>
                                @foreach(\App\Subject::all() as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for=""></label>
                            <input type="submit" style="margin-top: 25px" value="Search" class="btn btn-danger">
                        </div>
                    </form>
                    @else
                        <div class="alert alert-info">
                            There are no payment yet
                        </div>
                    @endif
                </div>
                <div class="card__body">

                    <hr style="background: #ddd;color: #ddd;border: 2px solid #333;">
                    @if(isset($payments))
                    <div class="card">
                        <h5>Results</h5>
                        <table class="table">
                            <tr>
                                <td>Year / {{$year}}</td>
                                <td>Month / {{$month}}</td>
                                <td>Subject / {{$mySub}}</td>
                                <td> <h4>Sum / {{$sum}}</h4></td>
                            </tr>
                        </table>
                    </div>
                    <hr style="background: #ddd;color: #ddd;border: 2px solid #333;">
                    @endif
                    <table id="questions-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th width="30">No</th>
                            <th>Question</th>
                            <th>Subject</th>
                            <th>Image</th>
                            <th width="60"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($payments))
                            @foreach($payments as $payment)
                                <th width="30">{{$loop->iteration}}</th>
                                <th>{{$payment->user->name}}</th>
                                <th>{{$payment->amount}}</th>
                                <th>{{$payment->order->package->name}}</th>
                                <th>{{$payment->order->package->subject->name}}</th>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        var table = $('#questions-table').DataTable();
    </script>
@endsection
