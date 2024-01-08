@extends('layouts.admin')

@section('content')
<body class="antialiased container">
    <div class="form-group">
        <label for="exampleInputEmail1">Name: {{$student->name}}</label>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Student ID: {{$student->student_id}}</label>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Email: {{$student->email}}</label>
    </div>
    <br>
    <a class="btn btn-primary" href="{{route('student.index')}}">Home</a>
</body>
@endsection