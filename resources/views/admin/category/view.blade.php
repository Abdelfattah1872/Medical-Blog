@extends('layouts.app')
@section('title')
    View All Categories
@endsection
@section('content')
    <div class="container">
        <h1 style="font-family:'Bodoni MT Black';color: #4c110f" class="text-center">All your Categories</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-dark">
                    <div class="card-body text-center">

                        @if (session()->get('success'))
                            <div class="alert alert-danger text-center">{{ session()->get('success') }}</div>
                        @endif
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cats as $cat)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td style="color: chartreuse;">{{$cat->name}}</td>
                                    <td>
                                        <div class="form-group text-center">
                                            <a class="btn bg-success text-center" href="{{ route('category.edit',$cat->id) }}" style="color: black"><i class="fa fa-2x fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </div>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('category.destroy', $cat->id)}}">
                                            <div class="form-group text-center">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn bg-danger" ><i class="fa fa-2x fa-trash-o" aria-hidden="true"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
