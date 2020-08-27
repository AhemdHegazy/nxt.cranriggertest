@extends('layouts.front')
@section('content')

    <section class="position-relative">
        <div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;" width="1898" height="335"></canvas></div>
        <div class="container">
            <div class="row  text-center">
                <div class="col">
                    <h1>Blog</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                            <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">Blog</li>
                            <li class="breadcrumb-item active text-danger" aria-current="page">{{$post->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- / .row -->
        </div>
        <!-- / .container -->
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Blog Card -->
                    <div class="card border-0 bg-transparent">
                        <div class="position-absolute bg-white shadow-primary text-center p-2 rounded ml-3 mt-3">{{date('d',strtotime($post->created_at))}}
                            <br>{{date('M',strtotime($post->created_at))}}</div>
                        <img class="card-img-top shadow rounded" src="{{$post->featured !=null ? asset($post->featured) : asset('assets/images/blog/01.png')}}" alt=" ">
                        <div class="card-body pt-5 px-0">
                            <ul class="list-inline">
                                <li class="list-inline-item pr-4"> <a href="#" class="text-muted"><i class="ti-comments mr-1 text-primary"></i> {{$post->comments->count()}}</a>
                                </li>
                            </ul>
                            <h2 class="font-weight-medium">
                                {{$post->title}}
                            </h2>
                        </div>
                        <p>{!! $post->content !!}</p>
                        <div class="mt-5">
                            <div class="mb-8">
                              <h2 class="mt-3">All Comments</h2>
                            </div>
                            @foreach($post->comments as $comment)

                                <div class="media d-block d-md-flex mt-8">
                                    <img class="img-fluid shadow rounded" alt="image" src="{{asset('assets/images/testimonial/09.jpg')}}">

                                    <div class="media-body mx-0 mx-md-5 mx-lg-8 my-5 my-md-0">
                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                        <h6>{{$comment->user->name}}</h6>  <small class="text-muted">{{$comment->created_at->diffForHumans()}}</small>
                                    </div>
                                    <p>{{$comment->comment}}</p>
                                </div>
                            </div>
                            @endforeach
                            @if($post->comments->count() == 0)
                                <div class="media d-block d-md-flex mt-8">
                                    <div class="media-body mx-0 mx-md-5 mx-lg-8 my-5 my-md-0">
                                        <p>No Comments Yet</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if(auth()->user())
                        <div class="post-comments mt-5">
                            <div class="mb-8">
                                <h2 class="mt-3">Leave A Comment</h2>
                            </div>
                            <form class="row" method="post" action="{{route('comments.post')}}">
                                @csrf
                                {{method_field('POST')}}
                                <div class="messages"></div>
                                <div class="form-group mb-0 col-sm-12">
                                    <textarea id="comment" name="comment" class="form-control border-0 bg-light h-100" placeholder="Your Comment" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary mt-5">Post Comment</button>
                                </div>
                            </form>
                        </div>
                        @else
                            Login To Add Comment
                        @endif
                        <div></div>
                    </div>
                    <!-- End Blog Card -->
                </div>
            </div>
        </div>
    </section>


@endsection
