@extends('layouts.app')
@section('title')
    show blog
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <H1 style="font-family:'Bodoni MT Black';color: #4c110f">Your Blog</H1>
                <div class="content d-flex text-center" style="justify-content: space-between">
                    <div class="card my-3 w-100 text-center">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{asset('uploads/'.$data->image)}}" class="card-img w-100" style="height: 350px">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body bg-warning"style="height: 350px">
                                    <h5 class="card-title">{{ $data->title }}</h5>
                                    <p class="card-text">{{ $data->cont }}</p>

                                    <div class="card-group">
                                        <div class="text-center m-auto">
                                            <a href="{{route('blog.edit', $data->id)}}" style="color: black;text-decoration: none" class="btn bg-success" ><i class="fa fa-3x fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </div>

                                        <form method="post" action="{{route('blog.destroy', $data->id)}}"class="m-auto">
                                            <div class="form-group text-center">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"  class="btn bg-danger" ><i class="fa fa-3x fa-trash-o" aria-hidden="true"></i></button>
                                            </div>
                                        </form>

                                    </div>

                                    <p class="card-text"><small class="text-muted">Views :{{ $data->views }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
