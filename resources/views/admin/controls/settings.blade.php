@extends('admin.layouts.app')
@section('content')
    <div class="card" style="margin-bottom: 0;">
        <div class="card__header">
            <h4>Settings

            </h4>
        </div>
        <div class="card__body">
            <form action="{{route('settings.update')}}" method="post" class="form">
                {{csrf_field()}}
               <div class="row">
                   <div class="col-lg-6">
                       <div class="form-group">
                           <label for="site_name">SITE NAME</label>
                           <input type="text" value="{{$settings->site_name}}" name="site_name" placeholder="enter site name" class="form-control">
                       </div>
                   </div>
                   <div class="col-lg-6">
                       <div class="form-group">
                           <label for="phone">CONTACT NUMBER</label>
                           <input type="text" value="{{$settings->phone}}" name="contact_number" placeholder="enter phone" class="form-control">
                       </div>
                   </div>
               </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">CONTACT EMAIL</label>
                            <input type="email" value="{{$settings->email}}" name="email" placeholder="enter email" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="address">ADDRESS</label>
                            <input type="text" value="{{$settings->address}}" name="address" placeholder="enter address" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="facebook">FACEBOOK</label>
                            <input type="text" value="{{$settings->facebook}}" name="facebook" placeholder="enter facebook" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="twitter">TWITTER</label>
                            <input type="text" value="{{$settings->twitter}}" name="twitter" placeholder="enter twitter" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="youtube">YOUTUBE</label>
                            <input type="text" value="{{$settings->youtube}}" name="youtube" placeholder="enter youtube" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="linked_in">Linked In</label>
                            <input type="text" value="{{$settings->linked_in}}" name="linked_in" placeholder="enter linked in" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="about">ABOUT</label>
                            <textarea placeholder="enter about" id="about" name="about" cols="5" rows="10" class="form-control">{{$settings->about}}</textarea>
                        </div>
                    </div>
                    <div class="formgroup text-center">
                        <input type="submit" value="Update Settings" class="btn btn-success">
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#about').summernote({
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
