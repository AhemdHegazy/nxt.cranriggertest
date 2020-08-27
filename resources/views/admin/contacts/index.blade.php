@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card__header">
                    <h4>Contacts List</h4>
                </div>
                <div class="card__body">
                    <table id="Country-table" class="table table-striped">

                        <thead>
                        <tr>
                            <th width="30">No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript">
    var table = $('#Country-table').DataTable({

        processing: true,
        serverSide: true,
        ajax: "{{ route('api.contacts') }}",

        columns: [
            {data: 'idn', name: 'idn'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'type', name: 'type'},
            {data: 'subject', name: 'subject'},
            {data: 'message', name: 'message'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
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
                url : "{{ url('admin/contacts') }}" + '/' + id,
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
