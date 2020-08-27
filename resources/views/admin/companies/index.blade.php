@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card__header">
                    <h4>Companies List
{{--
                        <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Add Company</a>
--}}
                    </h4>
                </div>
                <div class="card__body">
                    <table id="Subject-table" class="table table-striped">

                        <thead>
                        <tr>
                            <th width="30">No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Users</th>
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        @foreach(\App\Company::all() as $company)
            <div class="modal fade" id="exampleModal{{$company->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true" style="border-radius: 10px">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$company->name}} Detailes</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <tr>
                                    <td>Name</td>
                                    <td>{{$company->name}}</td>
                                </tr>
                                <tr>
                                    <td>Commercial Number</td>
                                    <td>{{$company->comm_number}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$company->email}}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{$company->phone}}</td>
                                </tr>
                                <tr>
                                    <td>Employees</td>
                                    <td>{{$company->employees}}</td>
                                </tr>
                                @if($company->title)
                                <tr>
                                    <td>Title</td>
                                    <td>{{$company->title}}</td>
                                </tr>
                                @endif
                                @if($company->twon)
                                <tr>
                                    <td>Town</td>
                                    <td>{{$company->twon}}</td>
                                </tr>
                                @endif
                                @if($company->logo)
                                    <tr>
                                        <td>logo</td>
                                        <td><img src="{{$company->logo}}" alt="" height="150" width="150"></td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Country</td>
                                    <td>{{\App\Country::find($company->country_id) ? \App\Country::find($company->country_id)->name : 'Other'}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        <
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('admin.companies.form')
@endsection
@section('scripts')
<script type="text/javascript">
    var table = $('#Subject-table').DataTable({
        serverSide: true,
        ajax: "{{ route('api.companies') }}",

        columns: [
            {data: 'idn', name: 'idn'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'orders', name: 'orders'},
            {data: 'details', name: 'details'},
        ],
    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add Company');
    }

    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
            url: "{{ url('admin/companies') }}" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit Company');

                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#phone').val(data.phone);
                $('#employees').val(data.employees);
                $('#country_id').val(data.country_id);
                $('#town').val(data.town);
                $('#title').val(data.title);
                $('#comm_number').val(data.comm_number);
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
                url : "{{ url('admin/companies') }}" + '/' + id,
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
                if (save_method == 'add') url = "{{ url('admin/companies') }}";
                else url = "{{ url('admin/companies') . '/' }}" + id;

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
