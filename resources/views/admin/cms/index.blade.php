@extends('admin.layouts.app')
@section('content')
    <style>
        .form-horizontal .control-label{
            font-size: 16px;
            padding-bottom: 5px;
            text-transform: capitalize;
        }
    </style>
    <div class="row">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
        <div class="col-md-11" style="margin-top: 40px">
            <div class="card">
                <div class="card__header">
                    <h4>Content Management System
                    </h4>
                </div>
                <div class="card__body" >
                    {{--
                    'organization_login',
            'individual_pkg',
            'individual_login',
            'contacts',
            'main_title',
            'main_title',
            'numbers_section',
            'exam_goals',
            'logo',
            'description',
            'address',
                    --}}
                    <form  method="post" class="form-horizontal" action="{{route('cms.update')}}" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('POST') }}
                            <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="organization_login" class="col-md-12 control-label" style="color: #ddd;;text-align: left">organization login</label>
                            <div class="col-md-12">
                                <textarea rows="10" id="organization_login" name="organization_login" class="form-control summernote" required>{!! $cms->organization_login !!}</textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="individual_login" class="col-md-12 control-label" style="color: #ddd;;text-align: left">individuals login</label>
                            <div class="col-md-12">
                                <textarea rows="10" id="individual_login" name="individual_login" class="form-control summernote" required>{!! $cms->individual_login !!}</textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="individual_pkg" class="col-md-12 control-label" style="color: #ddd;;text-align: left">individual Package</label>
                            <div class="col-md-12">
                                <textarea rows="10" id="individual_pkg" name="individual_pkg" class="form-control summernote" required>{!! $cms->individual_pkg !!}</textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="organization_pkg" class="col-md-12 control-label" style="color: #ddd;;text-align: left">organization Package</label>
                            <div class="col-md-12">
                                <textarea rows="10" id="organization_pkg" name="organization_pkg" class="form-control summernote" required>{!! $cms->organization_pkg !!}</textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contacts" class="col-md-12 control-label" style="color: #ddd;;text-align: left">contacts</label>
                            <div class="col-md-12">
                                <textarea rows="10" id="contacts" name="contacts" class="form-control summernote" required>{!! $cms->contacts !!}</textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_comments" class="col-md-12 control-label" style="color: #ddd;;text-align: left">user comments</label>
                            <div class="col-md-12">
                                <textarea rows="10" id="user_comments" name="user_comments" class="form-control summernote" required>{!! $cms->user_comments !!}</textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="main_title" class="col-md-12 control-label" style="color: #ddd;;text-align: left">main title</label>
                            <div class="col-md-12">
                                <textarea rows="10" id="main_title" name="main_title" class="form-control summernote" required>{!! $cms->main_title !!}</textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="numbers_section" class="col-md-12 control-label" style="color: #ddd;;text-align: left">numbers section</label>
                            <div class="col-md-12">
                                <textarea rows="10" id="numbers_section" name="numbers_section" class="form-control summernote" required>{!! $cms->numbers_section !!}</textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exam_goals" class="col-md-12 control-label" style="color: #ddd;;text-align: left">exam goals</label>
                            <div class="col-md-12">
                                <textarea rows="10" id="exam_goals" name="exam_goals" class="form-control summernote" required>{!! $cms->exam_goals !!}</textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-12 control-label" style="color: #ddd;;text-align: left">description</label>
                            <div class="col-md-12">
                                <textarea rows="10" id="description" name="description" class="form-control summernote" required>{!! $cms->description !!}</textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-md-12 control-label"  style="color: #ddd;text-align: left">address</label>
                            <div class="col-md-12">
                                <input type="text" id="address" name="address" class="form-control" value="{{$cms->address}}" autofocus required>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="logo" class="col-md-12 control-label" style="color: #ddd;;text-align: left">Logo</label>
                            <div class="col-md-10">
                                <input  type="file"  id="logo" name="logo" class="form-control"  required>
                                <span class="help-block with-errors"></span>
                            </div>
                            <div class="col-lg-2">
                                <img src="{{asset($cms->logo)}}" class="img-fluid img-responsive img-thumbnail" alt="">
                            </div>
                        </div>



                            <button type="submit" class="btn btn-primary btn-save">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
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
    </script>
@endsection
