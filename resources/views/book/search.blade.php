@extends('layouts.admin')
@section('content')

<div class="jumbotron container">
    <hr class="my-4">
    <a class="btn btn-primary btn-lg" href="{{route('book.index')}}" role="button">Return</a>
</div>

<br/>

<div class="container">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book name</th>
                <th scope="col">Book price</th> 
                <th scope="col">Book category</th>
                <th scope="col">Book image</th>
                <th scope="col">Book author</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <th scope="row">#</th>
                <td>{{$book->name}}</td>
                <td>{{$book->price}}</td>
                <td>{{$book->category}}</td>
                <td><img src="{{asset('images/books/'.$book->image)}}" width='50' height="50"></td>
                <td>{{$book->author}}</td>
                <td>{{$book->description}}</td>
                <td>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex">
                                    <a class="btn btn-success btn-sm mr-2" href="{{route('book.edit',$book->id)}}">Edit</a>
                                    <a class="btn btn-primary btn-sm mr-2" href="{{route('book.show',$book->id)}}">Show</a>
                                    <form action="{{route('book.delete',$book->id)}}" method="POST">  
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {!! $offer->links() !!} --}}
</div>
@endsection