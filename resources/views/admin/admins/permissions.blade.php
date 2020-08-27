@extends('admin.layouts.app')
@section('content')
    <style>
        .checkbox {
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
        input:hover ~ .checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
         input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .checkmark:after {
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
                <form id="form-contact" method="post" class="form-horizontal" data-toggle="validator">
                {{ csrf_field() }} {{ method_field('POST') }}
                    {{--Subjects--}}
                    <div class="card col-lg-6">
                        <div class="card__header">
                            <h4>Subject Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Show
                                    <input type="checkbox" name="subject_show" value="{{auth('admin')->user()->permission->subject_show}}"
                                        {{auth('admin')->user()->permission->subject_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="subject_add" value="{{auth('admin')->user()->permission->subject_add}}"
                                        {{auth('admin')->user()->permission->subject_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="subject_edit" value="{{auth('admin')->user()->permission->subject_edit}}"
                                        {{auth('admin')->user()->permission->subject_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="subject_delete" value="{{auth('admin')->user()->permission->subject_delete}}"
                                        {{auth('admin')->user()->permission->subject_delete == 1 ? "checked" : ''}}>
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
                                    <input type="checkbox" name="pacakge_show" value="{{auth('admin')->user()->permission->pacakge_show}}"
                                        {{auth('admin')->user()->permission->pacakge_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="pacakge_add" value="{{auth('admin')->user()->permission->pacakge_add}}"
                                        {{auth('admin')->user()->permission->pacakge_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="pacakge_edit" value="{{auth('admin')->user()->permission->pacakge_edit}}"
                                        {{auth('admin')->user()->permission->pacakge_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="pacakge_delete" value="{{auth('admin')->user()->permission->pacakge_delete}}"
                                        {{auth('admin')->user()->permission->pacakge_delete == 1 ? "checked" : ''}}>
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
                                    <input type="checkbox" name="question_show" value="{{auth('admin')->user()->permission->question_show}}"
                                        {{auth('admin')->user()->permission->question_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="question_add" value="{{auth('admin')->user()->permission->question_add}}"
                                        {{auth('admin')->user()->permission->question_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="question_edit" value="{{auth('admin')->user()->permission->question_edit}}"
                                        {{auth('admin')->user()->permission->question_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="question_delete" value="{{auth('admin')->user()->permission->question_delete}}"
                                        {{auth('admin')->user()->permission->question_delete == 1 ? "checked" : ''}}>
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
                                    <input type="checkbox" name="subject_show" value="{{auth('admin')->user()->permission->subject_show}}"
                                        {{auth('admin')->user()->permission->subject_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="subject_add" value="{{auth('admin')->user()->permission->subject_add}}"
                                        {{auth('admin')->user()->permission->subject_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="subject_edit" value="{{auth('admin')->user()->permission->subject_edit}}"
                                        {{auth('admin')->user()->permission->subject_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="subject_delete" value="{{auth('admin')->user()->permission->subject_delete}}"
                                        {{auth('admin')->user()->permission->subject_delete == 1 ? "checked" : ''}}>
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
                                    <input type="checkbox" name="subject_show" value="{{auth('admin')->user()->permission->subject_show}}"
                                        {{auth('admin')->user()->permission->subject_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="subject_add" value="{{auth('admin')->user()->permission->subject_add}}"
                                        {{auth('admin')->user()->permission->subject_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="subject_edit" value="{{auth('admin')->user()->permission->subject_edit}}"
                                        {{auth('admin')->user()->permission->subject_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="subject_delete" value="{{auth('admin')->user()->permission->subject_delete}}"
                                        {{auth('admin')->user()->permission->subject_delete == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{--Coupons--}}
                    <div class="card col-lg-6">
                        <div class="card__header">
                            <h4>Subject Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Show
                                    <input type="checkbox" name="subject_show" value="{{auth('admin')->user()->permission->subject_show}}"
                                        {{auth('admin')->user()->permission->subject_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="subject_add" value="{{auth('admin')->user()->permission->subject_add}}"
                                        {{auth('admin')->user()->permission->subject_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="subject_edit" value="{{auth('admin')->user()->permission->subject_edit}}"
                                        {{auth('admin')->user()->permission->subject_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="subject_delete" value="{{auth('admin')->user()->permission->subject_delete}}"
                                        {{auth('admin')->user()->permission->subject_delete == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{--Guidlines--}}
                    <div class="card col-lg-6">
                        <div class="card__header">
                            <h4>Subject Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Show
                                    <input type="checkbox" name="subject_show" value="{{auth('admin')->user()->permission->subject_show}}"
                                        {{auth('admin')->user()->permission->subject_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="subject_add" value="{{auth('admin')->user()->permission->subject_add}}"
                                        {{auth('admin')->user()->permission->subject_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="subject_edit" value="{{auth('admin')->user()->permission->subject_edit}}"
                                        {{auth('admin')->user()->permission->subject_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="subject_delete" value="{{auth('admin')->user()->permission->subject_delete}}"
                                        {{auth('admin')->user()->permission->subject_delete == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{--Memebers--}}
                    <div class="card col-lg-6">
                        <div class="card__header">
                            <h4>Subject Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Show
                                    <input type="checkbox" name="subject_show" value="{{auth('admin')->user()->permission->subject_show}}"
                                        {{auth('admin')->user()->permission->subject_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="subject_add" value="{{auth('admin')->user()->permission->subject_add}}"
                                        {{auth('admin')->user()->permission->subject_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="subject_edit" value="{{auth('admin')->user()->permission->subject_edit}}"
                                        {{auth('admin')->user()->permission->subject_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="subject_delete" value="{{auth('admin')->user()->permission->subject_delete}}"
                                        {{auth('admin')->user()->permission->subject_delete == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{--Payments--}}
                    <div class="card col-lg-6">
                        <div class="card__header">
                            <h4>Subject Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Show
                                    <input type="checkbox" name="subject_show" value="{{auth('admin')->user()->permission->subject_show}}"
                                        {{auth('admin')->user()->permission->subject_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="subject_add" value="{{auth('admin')->user()->permission->subject_add}}"
                                        {{auth('admin')->user()->permission->subject_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="subject_edit" value="{{auth('admin')->user()->permission->subject_edit}}"
                                        {{auth('admin')->user()->permission->subject_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="subject_delete" value="{{auth('admin')->user()->permission->subject_delete}}"
                                        {{auth('admin')->user()->permission->subject_delete == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{--CMS & Partener--}}
                    <div class="card col-lg-6">
                        <div class="card__header">
                            <h4>Subject Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Show
                                    <input type="checkbox" name="subject_show" value="{{auth('admin')->user()->permission->subject_show}}"
                                        {{auth('admin')->user()->permission->subject_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="subject_add" value="{{auth('admin')->user()->permission->subject_add}}"
                                        {{auth('admin')->user()->permission->subject_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="subject_edit" value="{{auth('admin')->user()->permission->subject_edit}}"
                                        {{auth('admin')->user()->permission->subject_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="subject_delete" value="{{auth('admin')->user()->permission->subject_delete}}"
                                        {{auth('admin')->user()->permission->subject_delete == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{--Testemonials & Grades--}}
                    <div class="card col-lg-6">
                        <div class="card__header">
                            <h4>Subject Permissions</h4>
                        </div>
                        <div class="card__body">
                            <div class="col-lg-3">
                                <label class="container">Show
                                    <input type="checkbox" name="subject_show" value="{{auth('admin')->user()->permission->subject_show}}"
                                        {{auth('admin')->user()->permission->subject_show == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Add
                                    <input type="checkbox" name="subject_add" value="{{auth('admin')->user()->permission->subject_add}}"
                                        {{auth('admin')->user()->permission->subject_add == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container" >Edit
                                    <input type="checkbox"name="subject_edit" value="{{auth('admin')->user()->permission->subject_edit}}"
                                        {{auth('admin')->user()->permission->subject_edit == 1 ? "checked" : ''}} >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="container">Delete
                                    <input type="checkbox" name="subject_delete" value="{{auth('admin')->user()->permission->subject_delete}}"
                                        {{auth('admin')->user()->permission->subject_delete == 1 ? "checked" : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- /container -->
@endsection
