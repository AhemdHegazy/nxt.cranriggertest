@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card__header">
                    <h4>Countries List
                        <a href="{{route('countries.index')}}" class="btn btn-primary pull-right" style="margin-top: -8px;">Add Country</a>
                    </h4>
                </div>
                <div class="card__body">
                    <table id="Subject-table" class="table table-striped">

                        <thead>
                        <tr>
                            <th width="30">No</th>
                            <th>Name</th>
                            <th>Code</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach(DB::table('world')->get() as $country)
                                <tr>
                                    <td width="30">{{$loop->iteration}}</td>
                                    <td>{{$country->name}}</td>
                                    <td>{{$country->code}}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        var table = $('#Subject-table').DataTable();
    </script>
@endsection
