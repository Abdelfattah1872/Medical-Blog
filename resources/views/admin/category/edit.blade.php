@extends('layouts.app')
@section('title')
    Edit Category
@endsection
@section('content')
    <div class="container">
        <h1 style="font-family:'Bodoni MT Black';color: #4c110f" class="text-center">Edit your Categories</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-secondary">
                    <div class="card-body text-center">
                        @if (session()->get('success'))
                            <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
                        @endif

                        <form method="POST" action="{{route('category.update',$cat ->id)}}">
                            <div class="form-group text-center">
                                @method('PUT')
                                @csrf
                                <label for="exampleInputEmail1">Edit Category</label>
                                <input type="text" class="form-control" value="{{ $cat ->name }}" id="cat" name="name">
                                {{$errors->first('name')}}
                            </div>
                            <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

