@extends('layouts.admin')
@section('content')

<div class="jumbotron container">
  <h1 class="display-4">All Books</h1>
  <form method='get' action="{{route('search')}}"> 
    <div class="input-group">
      <input type="search" name="book_search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
      <div class="input-group-append">
        <button type="submit" class="btn btn-outline-primary">Search</button>
      </div>
    </div>
  </form>
  
  <hr class="my-4">
  <a class="btn btn-primary btn-lg" href="{{route('book.create')}}" role="button">New Book</a>
</div>

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
          <div class="btn-group" role="group" aria-label="Book Actions">
            <a class="btn btn-success mr-1" href="{{route('book.edit',$book->id)}}">Edit</a>
            <a class="btn btn-primary mr-1" href="{{route('book.show',$book->id)}}">Show</a>
            <form action="{{route('book.delete',$book->id)}}" method="POST">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger mr-1">Delete</button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{-- {!! $offer->links() !!} --}}
</div>
@endsection