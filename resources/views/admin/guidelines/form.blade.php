
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
                            <h3 class="modal-title" style="color: #fff">
                            </h3>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" id="id" name="id">
                            <div class="form-group">
                                <label for="title" class="col-md-2 control-label"  style="color: #ddd;text-align: left">Title</label>
                                <div class="col-md-10">
                                    <input type="text" id="title" name="title" class="form-control" autofocus required>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-md-2 control-label" style="color: #ddd;;text-align: left">Description</label>
                                <div class="col-md-10">
                                    <textarea rows="10" id="description" name="description" class="form-control" required></textarea>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject_id" class="col-md-2 control-label"  style="color: #ddd;;text-align: left">Subject</label>
                                <div class="col-md-10">
                                    <select name="subject_id" id="subject_id" class="form-control" style="height: 35px">
                                        <option value="" disabled>Select Subject</option>
                                        <option value="">All</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                        @endforeach
                                    </select>
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
