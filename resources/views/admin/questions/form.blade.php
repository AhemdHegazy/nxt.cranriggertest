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
        top: 5px;
        left: 0;
        height: 25px;
        width: 25px;
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
        left: 8px;
        top: 3px;
        width: 10px;
        height: 13px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
</style>
<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" style="border-radius: 10px">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card" style="margin-bottom: 0;">
                <div class="card__body">
                    <form id="form-contact" method="post" class="form-horizontal" data-toggle="validator">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title" style="color: #fff;"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="question" class="col-md-1 control-label" style="color: #ddd;">Question</label>
                        <div class="col-md-11">
                            <textarea rows="10" class="summernote form-control" id="question" name="question" required></textarea>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image" class="col-md-2 control-label"  style="color: #ddd;;text-align: left">Photo</label>
                        <div class="col-md-8">
                            <input type="file" id="image" name="image" class="form-control" >
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="col-lg-2">
                            <label class="container" style="padding-top: 8px;font-size: 13px;">No Image
                                <input type="checkbox" class="checkbox" name="no_image" value="1">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject_id" class="col-md-2 control-label"  style="color: #ddd;;text-align: left">Subject</label>
                        <div class="col-md-10">
                            <select id="subject_id" class="form-control" style="height: 35px">
                                <option disabled selected>Select Subject</option>
                                @foreach($subjects as $capacity)
                                    <option value="{{$capacity->id}}">{{$capacity->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="capacity_id" class="col-md-2 control-label"  style="color: #ddd;;text-align: left;">Categories</label>
                        <div class="col-md-10">
                            <select name="capacity_id[]" id="capacity_id" class="form-control" style="height: 150px" multiple>
                                @foreach($capacities as $capacity)
                                    <option value="{{$capacity->id}}" style="padding:5px;margin:2px;border:1px solid #aaa">{{$capacity->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="options" class="col-md-2 control-label" style="color: #ddd;;text-align: left">Options</label>
                        <div class="col-md-5">
                            <div class="row">
                                <label for="options" class="col-md-3 control-label" style="color: #ddd;;text-align: left">First </label>
                                <div class="col-md-7">
                                    <input type="text" id="option1" name="options[]" class="form-control" required>
                                </div>
                                <label for="options" class="col-md-3 control-label" style="color: #ddd;;text-align: left">Second</label>
                                <div class="col-md-7">
                                    <input type="text" id="option2" name="options[]" class="form-control" required>
                                </div>
                                <label for="options" class="col-md-3 control-label" style="color: #ddd;;text-align: left">Third </label>
                                <div class="col-md-7">
                                    <input type="text" id="option3" name="options[]" class="form-control" required>
                                </div>
                                <label for="options" class="col-md-3 control-label" style="color: #ddd;;text-align: left">Forth </label>
                                <div class="col-md-7">
                                    <input type="text" id="option4" name="options[]" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline" style="position:relative;padding:9px 0;">
                                                <input type="radio" value="0" name="true" id="true1" required>
                                                <i class="input-helper"></i>
                                                <span style="position: absolute;top: 0"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline" style="position:relative;padding:9px 0;">
                                                <input type="radio" value="1" name="true" id="true2">
                                                <i class="input-helper"></i>
                                                <span style="position: absolute;top: 0"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline" style="position:relative;padding:9px 0;">
                                                <input type="radio" value="2" name="true" id="true3">
                                                <i class="input-helper"></i>
                                                <span style="position: absolute;top: 0"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="checkbox-inline" style="position:relative;padding:9px 0;">
                                                <input type="radio" value="3" name="true" id="true4">
                                                <i class="input-helper"></i>
                                                <span style="position: absolute;top: 0"></span>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>
                </div>
            </div>
        </div>
    </div>
</div>

