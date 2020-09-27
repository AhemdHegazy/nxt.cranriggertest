@extends('admin.layouts.app')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card__header">
                    <h4>Posts List
                        @if(\App\Http\Controllers\HelperController::hasAdd(auth('admin')->id(),'post') == true)
                        <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Add Post</a>
                        @endif
                    </h4>
                </div>
                <div class="card__body">
                    <table id="posts-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th width="30">No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Main Image</th>
                            <th>Subject</th>
                            <th width="60"></th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.posts.form')
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
                dialogsInBody: true,
                callbacks:{
                    onInit:function(){
                        $('body > .note-popover').hide();
                    }
                },
            });
        });
        var table = $('#posts-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.posts',auth('admin')->id()) }}",

            columns: [
                {data: 'idn', name: 'idn'},
                {data: 'title', name: 'title'},
                {data: 'description', name: 'description'},
                {data: 'featured', name: 'featured'},
                {data: 'subject', name: 'subject'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
        });

        function addForm() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Add Post');
            $('.summernote').summernote('code', '');
        }


        function editForm(id) {
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#modal-form form')[0].reset();
            $('.summernote').summernote('code', '');
            $.ajax({
                url: "{{ url('admin/posts') }}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {

                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit Post');

                    $('#modal-form #id').val(data.id);
                    $('#modal-form #title').val(data.title);
                    $('#modal-form #subject_id').val(data.subject_id);
                    $('#modal-form #description').val(data.description);
                    $('#modal-form #contents').val(data.content);
                    $('.summernote').summernote('code', data.content);
                    $('#modal-form #featured').val(data.featured);
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
                    url : "{{ url('admin/posts') }}" + '/' + id,
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

        $(function(){
            $('#modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('admin/posts') }}";
                    else url = "{{ url('admin/posts') . '/' }}" + id;

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
                            });

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
