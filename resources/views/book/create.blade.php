@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Add Book</h1>

        <form method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">book Name</label>
                <input type="text" class="form-control" name="name" placeholder="book Name">

                @error('name')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">book Price</label>
                <input type="text" class="form-control" name="price" placeholder="book Price">

                @error('price')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="details">book description</label>
                <input type="text" class="form-control" name="description" placeholder="book description">

                @error('descriptions')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="details">book author</label>
                <input type="text" class="form-control" name="author" placeholder="book author">

                @error('author')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="details">book category</label>
                <input type="text" class="form-control" name="category" placeholder="book category">

                @error('category')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">book image</label>
                <input type="file" class="form-control" name="image" placeholder="book image">

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