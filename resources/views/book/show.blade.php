@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table">
        <tbody>
            <tr>
                <th>Name:</th>
                <td>{{$book->name}}</td>
            </tr>
            <tr>
                <th>Price:</th>
                <td>{{$book->price}}</td>
            </tr>
            <tr>
                <th>Category:</th>
                <td>{{$book->category}}</td>
            </tr>
            <tr>
                <th>Author:</th>
                <td>{{$book->author}}</td>
            </tr>
            <tr>
                <th>Description:</th>
                <td>{{$book->description}}</td>
            </tr>
            <tr>
                <th>Image:</th>
                <td><img src="{{asset('images/books/'.$book->image)}}" width="50" height="50"></td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{route('book.index')}}">Home</a>
</div>
@endsection