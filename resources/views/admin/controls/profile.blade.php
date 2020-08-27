@extends('admin.layouts.app')
@section('content')
    <div class="card" style="padding-bottom: 100px;">
        <div class="card__header">
            <h4>Admin

            </h4>
        </div>
        <div class="card__body">
            <form action="{{route('profile.update')}}" method="post" class="form">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-lg-11">
                        <div class="form-group">
                            <label for="name">Admin Name</label>
                            <input type="text" value="{{$profile->name}}" name="name" placeholder="enter name *" class="form-control" required>
                            @error('name')
                            <strong class="text-danger">Name is required </strong>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-11">
                        <div class="form-group">
                            <label for="email">Admin Email</label>
                            <input type="text" value="{{$profile->email}}" name="email" placeholder="enter email *" class="form-control" required>
                            @error('email')
                            <strong class="text-danger">Email is required / can't be duplicated</strong>
                            @enderror
                        </div>

                    </div>
                </div><div class="row">
                    <div class="col-lg-11">
                        <div class="form-group">
                            <label for="password">Admin Password</label>
                            <input type="password" name="password" placeholder="enter new password" class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="formgroup text-center">
                        <input type="submit" value="Update Settings" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
