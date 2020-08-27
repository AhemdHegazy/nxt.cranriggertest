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
                                <li class="breadcrumb-item">Pages</li>
                                <li class="breadcrumb-item active text-danger" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- / .row -->
            </div>
            <!-- / .container -->
        </section>

        <div class="page-content">

            <!--blog start-->

            <section>
                <div class="container">
                    <div class="row">
                        @foreach(\App\Post::limit(3)->get() as $post)
                            <div class="col-12 col-lg-4 mb-6 mb-lg-0">
                                <!-- Blog Card -->
                                <div class="card border-0 bg-transparent">
                                    <div class="position-absolute bg-white shadow-primary text-center p-2 rounded ml-3 mt-3">{{date("d",strtotime($post->created_at))}}
                                        <br>{{date("M",strtotime($post->created_at))}}</div>
                                    <img class="card-img-top shadow rounded" style="height: 250px" src="{{$post->featured ? asset($post->featured) : asset('assets/images/blog/01.png')}}" alt="Image">
                                    <div class="card-body pt-5"> <a class="d-inline-block text-muted mb-2" href="#">Crane Operator & Rigger</a>
                                        <h2 class="h5 font-weight-medium">
                                            <a class="link-title" href="{{route('blog.single',$post->id)}}">{{$post->title}}</a>
                                        </h2>
                                         <p>{{Str::limit($post->description,50)}}</p>
                                    </div>
                                   {{-- <div class="card-footer bg-transparent border-0 pt-0">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item pr-4"> <a href="#" class="text-muted"><i class="ti-comments mr-1 text-danger"></i> 131</a>
                                            </li>
                                            <li class="list-inline-item pr-4"> <a href="#" class="text-muted"><i class="ti-eye mr-1 text-danger"></i> 255</a>
                                            </li>
                                            <li class="list-inline-item"> <a href="#" class="text-muted"><i class="ti-comments mr-1 text-danger"></i> 14</a>
                                            </li>
                                        </ul>
                                    </div>--}}
                                    <div></div>
                                </div>
                                <!-- End Blog Card -->
                            </div>
                        @endforeach
                    </div>

                    <div class="row mt-8">
                        @foreach($posts as $post)
                        <div class="col-12 col-lg-6">
                            <!-- Blog Card -->
                            <div class="card border-0 bg-transparent">
                                <div class="position-absolute bg-white shadow-primary text-center p-2 rounded ml-3 mt-3">{{date("d",strtotime($post->created_at))}}
                                    <br>{{date("M",strtotime($post->created_at))}}</div>
                                <img class="card-img-top shadow rounded"  style="height: 350px" src="{{$post->featured !=null ? asset($post->featured) : asset('assets/images/blog/01.png')}}" alt="Image">
                                <div class="card-body pt-5"> <a class="d-inline-block text-muted mb-2" href="#">Crane Operator & Rigger</a>
                                    <h2 class="h5 font-weight-medium">
                                        <a class="link-title" href="{{route('blog.single',$post->id)}}">{{$post->title}}</a>
                                    </h2>
                                     <p>{{Str::limit($post->description,50)}}</p>
                                </div>
                                <div></div>
                            </div>
                            <!-- End Blog Card -->
                        </div>
                        @endforeach
                    </div>

                    <div class="row mt-11">
                        <div class="col-lg-5 text-center">
                        </div>
                        <div class="col-lg-4 text-center">
                            {!! $posts->links() !!}
                        </div>
                    </div>
                </div>
            </section>

            <!--blog end-->

        </div>
@endsection
