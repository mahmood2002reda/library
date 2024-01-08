@extends('layouts.admin')
@section('content')

<div class="jumbotron container">
    <h1 class="display-4">All student</h1>
    
    <hr class="my-4">
    <a class="btn btn-primary btn-lg" href="{{route('student.index')}}" role="button">Return</a>
</div>

<div class="container">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">student name</th>
                <th scope="col">student id</th> 
                <th scope="col">student email</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <th scope="row">#</th>
                <td>{{$student->name}}</td>
                <td>{{$student->student_id}}</td>
                <td>{{$student->email}}</td>
                <td>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-success" href="{{route('student.edit',$student->id)}}">Edit</a>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="{{route('student.show',$student->id)}}">Show</a>
                            </div>
                            <div class="col">
                                <form action="{{route('student.delete',$student->id)}}" method="POST">  
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete student</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {!! $offer->links() !!} --}}
</div>
@endsection