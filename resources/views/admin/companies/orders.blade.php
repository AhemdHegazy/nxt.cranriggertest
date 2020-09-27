@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card__header">
                    <h4>{{\App\Company::find($companyId)->name}} Orders  list <span class="fa fa-shopping-basket"></span>
                    </h4>
                </div>
                <div class="card__body">
                    <table id="users-table" class="table table-striped">

                        <thead>
                        <tr>
                            <th width="30">No</th>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Package</th>
                            <th>Users</th>
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
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.company_orders',[$companyId,auth('admin')->id()]) }}",

            columns: [
                {data: 'idn', name: 'idn'},
                {data: 'number', name: 'number'},
                {data: 'name', name: 'name'},
                {data: 'amount', name: 'amount'},
                {data: 'package', name: 'package'},
                {data: 'users', name: 'users'},
            ],
        });

        /*delete*/
        function deleteData(id){
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                $.ajax({
                    url : "{{ url('admin/users') }}" + '/' + id,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' : csrf_token},
                    success : function(data) {
                        table.ajax.reload();
                        swal({
                            title: 'Success!',
                            text: data.message,
                            type: 'success',
                            timer: '750'
                        })
                    },
                    error : function () {
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '750'
                        })
                    }
                });
            });
        }

    </script>
@endsection
