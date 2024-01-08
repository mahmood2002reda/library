@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Book</h1>

           <form method='POST' action="{{route('book.update',$book->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">book Name</label>
                <input value="{{$book->name}}" type="text" class="form-control" name="name" placeholder="book Name">

                @error('name')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">book Price</label>
                <input value="{{$book->price}}" type="text" class="form-control" name="price" placeholder="book Price">

                @error('price')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="details">book description</label>
                <input value="{{$book->description}}" type="text" class="form-control" name="description" placeholder="book description">

                @error('descriptions')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="details">book author</label>
                <input value="{{$book->author}}" type="text" class="form-control" name="author" placeholder="book author">

                @error('author')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="details">book category</label>
                <input value="{{$book->category}}" type="text" class="form-control" name="category" placeholder="book category">

                @error('category')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                
                <label for="price">book image</label>
                <div class="form-group">
                <img src="{{asset('images/books/'.$book->image)}}"with='100' height="100">
                </div>
                <input value="" type="file" class="form-control" name="image" placeholder="book image">

                @error('image')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </br>
            <div class="form-group">

            <button type="submit" class="btn btn-primary">Store book</button>
        </div>
        </form>
    </div>
@endsection