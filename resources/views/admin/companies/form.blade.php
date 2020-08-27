
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
                                <label for="name" class="col-md-2 control-label"  style="color: #ddd;text-align: left">Name</label>
                                <div class="col-md-10">
                                    <input type="text" id="name" name="name" class="form-control" autofocus required>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-2 control-label"  style="color: #ddd;text-align: left">Email</label>
                                <div class="col-md-10">
                                    <input type="email" id="email" name="email" class="form-control" autofocus required>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comm_number" class="col-md-2 control-label"  style="color: #ddd;text-align: left">Commercial Number</label>
                                <div class="col-md-10">
                                    <input type="number" id="comm_number" name="comm_number" class="form-control" autofocus required>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="employees" class="col-md-2 control-label"  style="color: #ddd;text-align: left">Number of Employees</label>
                                <div class="col-md-10">
                                    <input type="number" id="employees" name="employees" class="form-control" autofocus required>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-md-2 control-label"  style="color: #ddd;text-align: left">Phone</label>
                                <div class="col-md-10">
                                    <input type="text" id="phone" name="phone" class="form-control">
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="logo" class="col-md-2 control-label"  style="color: #ddd;text-align: left">Logo</label>
                                <div class="col-md-10">
                                    <input type="file" id="logo" name="logo" class="form-control" >
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country_id" class="col-md-2 control-label"  style="color: #ddd;;text-align: left">Country</label>
                                <div class="col-md-10">
                                    <select name="country_id" id="country_id" class="form-control" style="height: 35px">
                                        <option value="0">Other</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="town" class="col-md-2 control-label"  style="color: #ddd;text-align: left">Town</label>
                                <div class="col-md-10">
                                    <input type="text" id="town" name="town" class="form-control">
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-md-2 control-label"  style="color: #ddd;text-align: left">Full Title</label>
                                <div class="col-md-10">
                                    <input type="text" id="title" name="title" class="form-control">
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
