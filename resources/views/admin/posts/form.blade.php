
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
                                <label for="title" class="col-md-1 control-label" style="color: #ddd;">Title</label>
                                <div class="col-md-11">
                                    <input type="text" id="title" name="title" class="form-control" autofocus required>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-md-1 control-label" style="color: #ddd;">Description</label>
                                <div class="col-md-11">
                                    <textarea rows="5" id="description" name="description" class="form-control" required></textarea>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contents" class="col-md-1 control-label" style="color: #ddd;">Content</label>
                                <div class="col-md-11">
                                    <textarea rows="10" class="summernote form-control" id="contents" name="contents" required></textarea>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="featured" class="col-md-1 control-label">Main Photo</label>
                                <div class="col-md-11">
                                    <input type="file" id="featured" name="featured" class="form-control" >
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
