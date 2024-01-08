@extends('layouts.student')
@section('content')

<div class="container">
    
 

    <div class="row">
        @foreach ($book as $item)
        <div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/books/'.$item->image) }}" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">{{ $item->description }}</p>
                    <a href="{{ route('book.detail', $item->id) }}" class="btn btn-primary">Go Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection