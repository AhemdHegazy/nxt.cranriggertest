
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
                        <label for="name" class="col-md-2 control-label" style="color: #ddd;;text-align: left">Package Name</label>
                        <div class="col-md-10">
                            <input type="text" id="name" name="name" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-md-2 control-label"  style="color: #ddd;;text-align: left">Category</label>
                        <div class="col-md-10">
                            <select name="type" id="type" class="form-control" style="height: 35px">
                                <option value="0">Individuals</option>
                                <option value="1">Companies</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject_id" class="col-md-2 control-label"  style="color: #ddd;;text-align: left">Subject</label>
                        <div class="col-md-10">
                            <select name="subject_id" id="subject_id" class="form-control" style="height: 35px">
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="questions" class="col-md-2 control-label" style="color: #ddd;;text-align: left">Number Of Questions</label>
                        <div class="col-md-10">
                            <input type="number" id="questions" name="questions" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-md-2 control-label" style="color: #ddd;;text-align: left">Price in [SR]</label>
                        <div class="col-md-10">
                            <input type="number" id="price" name="price" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hours" class="col-md-2 control-label" style="color: #ddd;;text-align: left">Number Of Hours</label>
                        <div class="col-md-10">
                            <input type="number" id="hours" name="hours" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="increase" class="col-md-2 control-label" style="color: #ddd;;text-align: left">Increase Price / 1 Hour</label>
                        <div class="col-md-10">
                            <input type="number" id="increase" name="increase" class="form-control" required>
                            <span class="help-block with-errors"></span>
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

