@extends('layouts.app')
@section('title')
    show all blogs
@endsection
@section('content')
    <div class="container text-center">
        <H1 style="font-family:'Bodoni MT Black';color: #4c110f">All Your Blogs</H1>
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <div class="content d-flex text-center" style="justify-content: space-between;flex-wrap: wrap">
                        @foreach($data as $blog)
                            <div class="card card-dark bg-dark mt-5 mx-2" style="width: 18rem;">
                                <img src="{{asset('uploads/'.$blog->image)}}" class="card-img-top" style="height: 200px">
                                <div class="card-body">
                                    <h5 class="card-title text-white">{{ $blog->title }}</h5>
                                    <p class="card-text text-white" style="">{{ $blog->brief }}</p>
                                    <p class="card-text"><small class="text-muted">Views :{{ $blog->views }}</small></p>
                                    <a href="{{route('blog.show', $blog->id)}}" class="btn btn-info">Show More</a>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
