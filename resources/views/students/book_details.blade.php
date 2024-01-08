<!-- booking-details.blade.php -->

@extends('layouts.student')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Book Details
                </div>

                <div class="card-body">
                    <div class="card-body">
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        <form method="POST" action="{{route('book.borrow', $book->id)}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="return_date">Return Date</label>
                                <input type="date" class="form-control" name="return_date" placeholder="Return Date">

                                @error('return_date')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div> 
                            <br/>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Borrow Book</button>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <p><strong>Book Name:</strong> {{$book->name}} </p>
                        <p><strong>Book Author:</strong> {{$book->author}} </p>
                        <p><strong>Book Description:</strong> {{$book->description}} </p>
                        <p><strong>Book Category:</strong> {{$book->category}} </p>
                        <p><strong>Book Image:</strong></p>
                        @if($book->student->isNotEmpty())
                        @foreach($book->student as $student)
                            <p><strong>Return Date:</strong> {{$student->pivot->return_date}}</p>
                        @endforeach
                    @else
                        <p><strong>Return Date:</strong> Available</p>
                    @endif
                        <img src="{{asset('images/books/'.$book->image)}}" class="card-img-top" alt="Book Image">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection