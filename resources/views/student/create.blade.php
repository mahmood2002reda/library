@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Add student</h1>

        <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">student Name</label>
                <input type="text" class="form-control" name="name" placeholder="student Name">

                @error('name')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">student student_id</label>
                <input type="text" class="form-control" name="student_id" placeholder="student_id">

                @error('student_id')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
<br/>
           
            <button type="submit" class="btn btn-primary">Store student</button>
        </div>
        </form>
    </div>
@endsection