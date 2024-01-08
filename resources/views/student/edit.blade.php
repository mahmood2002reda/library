@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit student</h1>

           <form method='POST' action="{{route('student.update',$student->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">student Name</label>
                <input value="{{$student->name}}" type="text" class="form-control" name="name" placeholder="student Name">

                @error('name')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="student_id">student_id</label>
                <input value="{{$student->student_id}}" type="text" class="form-control" name="student_id" placeholder="student id">

                @error('student_id')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

        <br/>
            <div class="form-group">

            <button type="submit" class="btn btn-primary">Store student</button>
        </div>
        </form>
    </div>
@endsection