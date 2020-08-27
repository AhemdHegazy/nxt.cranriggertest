
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
                                <label for="user_id" class="col-md-2 control-label"  style="color: #ddd;;text-align: left">Users</label>
                                <div class="col-md-10">
                                    <select name="user_id" id="user_id" class="form-control" style="height: 35px">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="package_id" class="col-md-2 control-label"  style="color: #ddd;;text-align: left">Packages</label>
                                <div class="col-md-10">
                                    <select name="package_id" id="package_id" class="form-control" style="height: 35px">
                                        @foreach($packages as $package)
                                            <option value="{{$package->id}}">{{$package->name}} - {{$package->questions}} Q- {{$package->price}} RL</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" value="0" name="has_coupon" id="has_coupon">
                            <input type="hidden" value="0" name="coupon_id" id="coupon_id">

                            <div class="form-group">
                                <label for="subject_id" class="col-md-2 control-label"  style="color: #ddd;;text-align: left">Hours</label>
                                <div class="col-md-10">
                                    <input type="text" name="hours" id="hours" class="form-control" placeholder="Enter Hours" value="1" required>
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
<script>

</script>
