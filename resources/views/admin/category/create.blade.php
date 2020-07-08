@extends('layouts.app')
@section('title')
    Add New Category
@endsection
@section('content')
    <div class="container">
        <h1 style="font-family:'Bodoni MT Black';color: #4c110f" class="text-center">Add new to your Categories</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-primary">
                    <div class="card-body text-center">
                        @if (session()->get('success'))
                            <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
                        @endif
                            <form method="post" action="{{route('category.store')}}">
                                    <div class="form-group text-center">
                                        @csrf
                                        <label for="exampleInputEmail1">Add New Category</label>
                                        <input type="text" class="form-control" id="cat" name="name">
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
