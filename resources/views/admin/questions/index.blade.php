@extends('admin.layouts.app')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card__header">
                        @if($capacities->count()!=0)
                            <h4>Questions List
                                <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Add Question</a>
                            </h4>
                        @else
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                                <small>
                                    Please! <a href="{{route('capacities.index')}}" class="alert-link">Add Some subjects</a>
                                </small>
                            </div>
                        @endif

                    </div>
                    <div class="card__body">
                        <table id="questions-table" class="table table-striped">
                            <thead>
                            <tr>
                            <th width="30">No</th>
                            <th>Question</th>
                            <th>Capcaity</th>
                            <th>Image</th>
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
    @include('admin.questions.form')
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>

    <script type="text/javascript">
        $('#subject_id').change(function(){
            if($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('subjects.fetch') }}",
                    method:"POST",
                    data:{select:select, value:value, _token:_token},
                    success:function(result)
                    {
                        $('#capacity_id').html(result);
                    }

                })
            }
        });
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

    var table = $('#questions-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('api.questions',auth('admin')->id()) }}",

        columns: [
            {data: 'idn', name: 'idn'},
            {data: 'question', name: 'question'},
            {data: 'capacity_id', name: 'capacity_id'},
            {data: 'image', name: 'image'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add Question');
        $('.summernote').summernote('code', '');
    }

    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
            url: "{{ url('admin/questions') }}" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit Question');

                $('#id').val(data.id);
                $('.summernote').summernote('code', data.question);
                $('#capacity_id').val(data.capacity_id);
                //$('#image').val(data.image);//value.true
                $.each(data.options ,function (index,value) {
                    index = index+1;
                    $('#option'+index).val(value.option);
                    if(value.true === 1){
                        $('#true'+index).prop("checked", true);
                    }
                })
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
                url : "{{ url('admin/questions') }}" + '/' + id,
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
                if (save_method == 'add') url = "{{ url('admin/questions') }}";
                else url = "{{ url('admin/questions') . '/' }}" + id;

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
