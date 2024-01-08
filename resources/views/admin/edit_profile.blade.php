@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit information</h1>

           <form method='POST' action="{{route('admin.info.update')}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name"> Name</label>
                <input value="{{$user->name}}" type="text" class="form-control" name="name" placeholder=" Name">

                @error('name')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">email</label>
                <input value="{{$user->email}}" type="text" class="form-control" name="email" placeholder="email">

                @error('email')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

           
            
        </br>
            <div class="form-group">

            <button type="submit" class="btn btn-primary">update </button>
        </div>
        </form>
    </div>
@endsection