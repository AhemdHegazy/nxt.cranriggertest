@extends('admin.layouts.app')
@section('content')
    <style>
        /* The container */
        .container {
            display: block;
            position: relative;
            padding-left: 20px;
            margin-bottom: 30px;
            cursor: pointer;
            font-size: 15px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 15px;
            width: 15px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .container input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .container input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .container .checkmark:after {
            left: 5px;
            top: 1px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>
    <div class="row">
        <div class="col-md-11">
            <div class="card__header">
                <h4>{{ucwords(auth('admin')->user()->name)}} Permissions
                </h4>
            </div>
            <div class="card__body">
                <form id="form-contact" action="{{route('save.permissions')}}" method="post" class="form-horizontal">
                {{ csrf_field() }} {{ method_field('POST') }}
                    {{--Subjects--}}
                    <div class="card col-lg-6">
                        <div class="card__header">
                            <h4>Subject Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Show
                                    <input type="checkbox" name="subject_show" value="{{$permissions->subject_show}}"
                                        {{$permissions->subject_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="subject_add" value="{{$permissions->subject_add}}"
                                        {{$permissions->subject_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="subject_edit" value="{{$permissions->subject_edit}}"
                                        {{$permissions->subject_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="subject_delete" value="{{$permissions->subject_delete}}"
                                        {{$permissions->subject_delete == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{--Capacity--}}
                    <div class="card col-lg-6">
                        <div class="card__header">
                            <h4>Categories Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Show
                                    <input type="checkbox" name="capacity_show" value="{{$permissions->capacity_show}}"
                                        {{$permissions->capacity_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="capacity_add" value="{{$permissions->capacity_add}}"
                                        {{$permissions->capacity_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="capacity_edit" value="{{$permissions->capacity_edit}}"
                                        {{$permissions->capacity_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="capacity_delete" value="{{$permissions->capacity_delete}}"
                                        {{$permissions->capacity_delete == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{--Packages--}}
                    <div class="card col-lg-6">
                        <div class="card__header">
                            <h4>Packages Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Show
                                    <input type="checkbox" name="package_show" value="{{$permissions->package_show}}"
                                        {{$permissions->package_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="package_add" value="{{$permissions->package_add}}"
                                        {{$permissions->package_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="package_edit" value="{{$permissions->package_edit}}"
                                        {{$permissions->package_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="package_delete" value="{{$permissions->package_delete}}"
                                        {{$permissions->package_delete == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{--Questions--}}
                    <div class="card col-lg-6">
                        <div class="card__header">
                            <h4>Questions Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Show
                                    <input type="checkbox" name="question_show" value="{{$permissions->question_show}}"
                                        {{$permissions->question_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="question_add" value="{{$permissions->question_add}}"
                                        {{$permissions->question_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="question_edit" value="{{$permissions->question_edit}}"
                                        {{$permissions->question_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="question_delete" value="{{$permissions->question_delete}}"
                                        {{$permissions->question_delete == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{--Post--}}
                    <div class="card col-lg-6">
                        <div class="card__header">
                            <h4>Subject Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Show
                                    <input type="checkbox" name="post_show" value="{{$permissions->post_show}}"
                                        {{$permissions->post_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="post_add" value="{{$permissions->post_add}}"
                                        {{$permissions->post_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="post_edit" value="{{$permissions->post_edit}}"
                                        {{$permissions->post_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="post_delete" value="{{$permissions->post_delete}}"
                                        {{$permissions->post_delete == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{--Country--}}
                    <div class="card col-lg-6">
                        <div class="card__header">
                            <h4>Subject Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Show
                                    <input type="checkbox" name="country_show" value="{{$permissions->country_show}}"
                                        {{$permissions->country_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="country_add" value="{{$permissions->country_add}}"
                                        {{$permissions->country_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="country_edit" value="{{$permissions->country_edit}}"
                                        {{$permissions->country_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="country_delete" value="{{$permissions->country_delete}}"
                                        {{$permissions->country_delete == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{--Coupons--}}
                    <div class="card col-lg-6">
                        <div class="card__header">
                            <h4>Coupons Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Show
                                    <input type="checkbox" name="coupon_show" value="{{$permissions->coupon_show}}"
                                        {{$permissions->coupon_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="coupon_add" value="{{$permissions->coupon_add}}"
                                        {{$permissions->coupon_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="coupon_edit" value="{{$permissions->coupon_edit}}"
                                        {{$permissions->coupon_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="subject_delete" value="{{$permissions->subject_delete}}"
                                        {{$permissions->subject_delete == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{--Guidlines--}}
                    <div class="card col-lg-6">
                        <div class="card__header">
                            <h4>GuideLines Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Show
                                    <input type="checkbox" name="guideline_show" value="{{$permissions->guideline_show}}"
                                        {{$permissions->guideline_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="guideline_add" value="{{$permissions->guideline_add}}"
                                        {{$permissions->guideline_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="guideline_edit" value="{{$permissions->guideline_edit}}"
                                        {{$permissions->guideline_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="guideline_delete" value="{{$permissions->guideline_delete}}"
                                        {{$permissions->guideline_delete == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{--Memebers--}}
                    <div class="card col-lg-6">
                        <div class="card__header">
                            <h4>Members Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Show
                                    <input type="checkbox" name="admin_show" value="{{$permissions->admin_show}}"
                                        {{$permissions->admin_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="admin_add" value="{{$permissions->admin_add}}"
                                        {{$permissions->admin_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="admin_edit" value="{{$permissions->admin_edit}}"
                                        {{$permissions->admin_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="admin_delete" value="{{$permissions->admin_delete}}"
                                        {{$permissions->admin_delete == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card col-lg-6">
                        <div class="card__header">
                            <h4>Testimonials Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Show
                                    <input type="checkbox" name="testimonial_show" value="{{$permissions->testimonial_show}}"
                                        {{$permissions->testimonial_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="admin_delete" value="{{$permissions->admin_delete}}"
                                        {{$permissions->admin_delete == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{--Permistions--}}
                    <div class="card col-lg-12">
                        <div class="card__header">
                            <h4>Administrative Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Permissions Show
                                    <input type="checkbox" name="permission_show" value="{{$permissions->permission_show}}"
                                        {{$permissions->permission_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Permissions Edit
                                    <input type="checkbox" name="permission_add" value="{{$permissions->permission_add}}"
                                        {{$permissions->permission_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Payments Show
                                    <input type="checkbox" name="payment_show" value="{{$permissions->payment_show}}"
                                        {{$permissions->payment_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Grades Show
                                    <input type="checkbox" name="grads_show" value="{{$permissions->grads_show}}"
                                        {{$permissions->grads_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{--CMS & Partener--}}
                    <div class="card col-lg-12">
                        <div class="card__header">
                            <h4>CMS Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">CMS Show
                                    <input type="checkbox" name="cms_show" value="{{$permissions->cms_show}}"
                                        {{$permissions->cms_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">CMS Edit
                                    <input type="checkbox" name="cms_edit" value="{{$permissions->cms_edit}}"
                                        {{$permissions->cms_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Chat Reply
                                    <input type="checkbox" name="message_add" value="{{$permissions->message_add}}"
                                        {{$permissions->message_add == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Chat Show
                                    <input type="checkbox" name="message_show" value="{{$permissions->message_show}}"
                                        {{$permissions->message_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                        </div>
                        <input type="hidden" name="id" value="{{$permissions->id}}">
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-success btn-lg">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- /container -->
@endsection
