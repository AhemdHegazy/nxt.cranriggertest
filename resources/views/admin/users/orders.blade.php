@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card__header">
                    <h4>{{\App\User::find($userId)->name}} Orders  list <span class="fa fa-shopping-basket"></span>
                    </h4>
                </div>
                <div class="card__body">
                    <table id="users-table" class="table table-striped">

                        <thead>
                        <tr>
                            <th width="30">No</th>
                            <th>Number</th>
                            <th>Amount</th>
                            <th>Answers</th>
                            <th>Grade</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div> <!-- /container -->
@endsection

@section('scripts')
    <script type="text/javascript">
        var table = $('#users-table').DataTable({
            ajax: "{{ route('api.users_orders',$userId) }}",

            columns: [
                {data: 'idn', name: 'idn'},
                {data: 'number', name: 'number'},
                {data: 'amount', name: 'amount'},
                {data: 'answers', name: 'answers'},
                {data: 'grades', name: 'grades'},
            ],
        });
    </script>
@endsection
