@extends('layouts.admin')
@section('content')



@section('content')
<div class="jumbotron container">
    <h1 class="display-4">All student</h1>
    <form method='get' action="{{route('search')}}"> 

      <div class="input-group">
        <input type="search" name="student_search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button type="submit" class="btn btn-outline-primary">search</button>
      </div>
    </form>
    
    <hr class="my-4">
    <a class="btn btn-primary btn-lg"href="{{route('student.create')}}" role="button">NEW student</a>
  </div>

  
  
  <div class="container">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
               
                <th scope="col">student name</th>
                  <th scope="col">student id </th> 
                  <th scope="col">student email </th>
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
           
            


            <td></td>
      
            
            <td>

                <div class="container text-center">
                    <div class="row">
                      <div class="col">
                        <a  class="btn btn-success" href="{{route('student.edit',$student->id)}}"> Edit</a>

                      </div>
                      <div class="col">
                        <a class="btn btn-primary" href="{{route('student.show',$student->id)}}"> Show</a>

                      </div>
                   
                  
                      <div class="col">
                        <form action="{{route('student.delete',$student->id)}}" method="POST">  
                            @csrf
                            @method('delete')
                            <input type="submit" value="delete student" class="btn btn-danger">


                        </form>
                    </div>
                  </div>
                

           
        </td>
          </tr>
            
          @endforeach
          
        </tbody>
      </table>
      
      <?php // { !! $offer->links () !!}?>
  </div>
@endsection



