@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card__header">
                    <h4>{{\App\Payment::find($paymentId)->user->name}} Answers
                    </h4>
                </div>
                <div class="card__body">
                    <table id="users-table" class="table table-striped">

                        <thead>
                        <tr>
                            <th width="30">No</th>
                            <th>Question</th>
                            <th>User Answer</th>
                            <th>True Answer</th>
                            <th>Value</th>
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
            ajax: "{{ route('api.users_answers',$paymentId) }}",

            columns: [
                {data: 'idn', name: 'idn'},
                {data: 'question', name: 'question'},
                {data: 'option', name: 'option'},
                {data: 'true', name: 'true'},
                {data: 'result', name: 'result'},
            ],
        });
    </script>
@endsection
