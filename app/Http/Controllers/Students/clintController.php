<?php

namespace App\Http\Controllers\Students;

use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class clintController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function book_details($id)
    {

        $book = Book::find($id);

    return view('students.book_details', compact('book'));

    }
    public function index()
    {
        $book=Book::get();
        return view('students.index',compact('book'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function borrow(Request $request, $id)
    {
        $book = Book::find($id);
        if($book->is_available == 0){
            ;  
            
            return redirect()->back()->with('error','the book is not available');
        }
        else{
           $book->is_available = 0;
        $book->save();  
        }
       
    
        if ($request->has('return_date')) {
            $student = Auth::guard('student')->user(); // افترض أن الطالب مسجل دخوله
            $returnDate = $request->return_date;
    
            $book->student()->attach($student->id, ['borrow_date' => now(), 'return_date' => $returnDate]);
        }
        
        return redirect()->route('student.home');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function my_book(Request $request)
    {
        $userid = Auth::guard('student')->id();
$book= DB::table('student_book')
    ->join('students', 'students.id', '=', 'student_book.student_id')
    ->join('books', 'books.id', '=', 'student_book.book_id')
    ->select('student_book.*', 'students.*', 'books.*')
    ->where('students.id', $userid)
    ->get();
        return view('students.my_book',compact('book'));

    }

    /**
     * Display the specified resource.
     */
   
     public function Return_shelf(string $id)
     {
         
        $userid = Auth::guard('student')->id();
            $book = Book::where('id',$id)->update([
            'is_available' => 1
            ]);
            DB::table('student_book')
            ->where('student_id',  $userid )
            ->where('book_id', $id)
            ->delete();
             return redirect()->back()->with('success', 'The book has been returned');
         
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function profile()
{
    $studentId = Auth::guard('student')->id();
    $student = Student::where('id', $studentId)->get();
    return view('students.profile', compact('student'));
}

    /**
     * Update the specified resource in storage.
     */
    public function edit_info()
    {
        $student = Auth::guard('student')->user();

        return view('students.edit_profile',compact('student'));

    }

    public function update_info(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
          
        ]);
         /** @var \App\Models\Student $student_info */
     $student_info = Auth::guard('student')->user();
     $student_info->update([
'name'=>$request->name,
'email'=>$request->email,

     ]);
$student_info->save();
return redirect()->route('student.home')->with('success', 'informaion updated successfully.');


    }
    public function edit()
    {

       
        return view('students.resetPassword');
    }
    public function update(Request $request)
    {
        /** @var \App\Models\Student $student */

        $student =  Auth::guard('student')->user();
    
        if (!Hash::check($request->old_password, $student->password)) {
            // Old password does not match
            return back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }
    if($request->new_password === $request->confirm_password){

    
        $student->password = Hash::make($request->new_password);
        $student->save();
    
        return redirect()->route('student.home')->with('success', 'Password updated successfully.');
    }
    else{
        return back()->withErrors(['confirm_password' => 'Confirm password is incorrect']);

    }

}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
         /** @var \App\Models\User $student */
         $student =  Auth::guard('student')->user();
        $student->delete();
        return redirect('/students/login');
    }
    public function search(Request $request){
        
        if ($search = $request->book_search) {
          $book= Book::where('name', 'LIKE', "%{$search}%")
          ->orWhere('author', 'LIKE', "%{$search}%")
          ->get();
         
  
          return view('students.search', compact('book'));
        }
      
         
      }

}
