@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card__header">
                    <h4>Guidelines List
                        @if(\App\Http\Controllers\HelperController::hasAdd(auth('admin')->id(),'guideline') == true)
                        <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Add Guideline</a>
                        @endif
                    </h4>
                </div>
                <div class="card__body">
                    <table id="Guideline-table" class="table table-striped">

                        <thead>
                        <tr>
                            <th width="30">No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Subject</th>
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
    @include('admin.guidelines.form')
@endsection
@section('scripts')
<script type="text/javascript">
    var table = $('#Guideline-table').DataTable({

        processing: true,
        serverSide: true,
        ajax: "{{ route('api.guidelines',auth('admin')->id()) }}",

        columns: [
            {data: 'idn', name: 'idn'},
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
            {data: 'subject', name: 'subject'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],



    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add Guideline');
    }

    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
            url: "{{ url('admin/guidelines') }}" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit Guideline');

                $('#id').val(data.id);
                $('#title').val(data.title);
                $('#description').val(data.description);
                $('#subject_id').val(data.subject_id);
            },
            error : function() {
                alert("Nothing Data");
            }
        });
    }
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
                url : "{{ url('admin/guidelines') }}" + '/' + id,
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
    /* add function*/
    $(function(){
        $('#modal-form form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                var id = $('#id').val();
                if (save_method == 'add') url = "{{ url('admin/guidelines') }}";
                else url = "{{ url('admin/guidelines') . '/' }}" + id;

                $.ajax({
                    url : url,
                    type : "POST",
//                        data : $('#modal-form form').serialize(),
                    data: new FormData($("#modal-form form")[0]),
                    contentType: false,
                    processData: false,
                    success : function(data) {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                        swal({
                            title: 'Success!',
                            text: data.message,
                            type: 'success',
                            timer: '750'
                        })
                    },
                    error : function(data){
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '750'
                        })
                    }
                });
                return false;
            }
        });
    });

</script>
@endsection
