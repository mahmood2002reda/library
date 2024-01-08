@extends('layouts.student')
@section('content')



@section('content')
<div class="jumbotron container">
    
    <hr class="my-4">
 
  </div>

  
  
  <div class="container">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
               
                <th scope="col"> name</th>
                  <th scope="col">email </th> 
                  <th scope="col">student id </th> 

                  
                  
             

              
              </tr>
        </thead>
        <tbody>
          
          @foreach ($student as $item)
              
          
           
                 <tr>
            <th scope="row">#</th>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->student_id}}</td>
            


            <td></td>
      
            
            <td>

                <div class="container text-center">
                    <div class="row">
                      <div class="col">
                        <a  class="btn btn-success" href=" {{route('student.password.reset')}}"> reset password</a>
                        
                      </div>
                      <div class="col">
                        <a class="btn btn-primary" href=" {{route('student.info.reset')}}">  student information</a>

                      </div>
                  
                  
                      <div class="col">
                        <form action="{{route('student.info.delete')}}" method="POST">  
                            @csrf
                            @method('delete')
                            <input type="submit" value="delete account" class="btn btn-danger">


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



