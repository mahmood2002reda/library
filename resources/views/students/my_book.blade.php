@extends('layouts.student')
@section('content')

<div class="container">
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="d-flex flex-wrap">
            @foreach ($book as $item)
            <div class="card mb-3" style="width: 18rem;">
                <img src="{{ asset('images/books/'.$item->image) }}" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title" style="min-height: 50px;">{{ $item->name }}</h5>
                    <p class="card-text" style="min-height: 80px;">{{ $item->description }}</p>
                    <a href="{{ route('book.detail', $item->id) }}" class="btn btn-primary">Go Details</a>
                    <a href="{{ route('book.Return_shelf', $item->id) }}" class="btn btn-warning">رجع الكتب يا خطيب</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection