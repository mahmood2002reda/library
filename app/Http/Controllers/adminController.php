<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book=Book::get();
        $book_count=$book->count();
        $student=Student::get();
        $student_count=$student->count();
        $user=User::get();
        $user_count=$user->count();
        $authorWithMostBooks = Book::select('author', DB::raw('COUNT(*) as total'))
    ->groupBy('author')
    ->orderByDesc('total')
    ->limit(1)
    ->first();

$authorName = $authorWithMostBooks->author;
$totalBooks = $authorWithMostBooks->total;


                
        
        return view('admin.index',compact('book_count','student_count','user_count','authorName','totalBooks'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function profile()
{
    $userId = Auth::id();
    $user = User::where('id', $userId)->get();
    return view('admin.profile', compact('user'));
}
    public function edit_info()
    {
        $user = Auth::user();

        return view('admin.edit_profile',compact('user'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function update_info(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
          
        ]);
         /** @var \App\Models\User $user_info */
     $user_info =Auth::user();
     $user_info->update([
'name'=>$request->name,
'email'=>$request->email,

     ]);
$user_info->save();
return redirect()->route('admin.index')->with('success', 'informaion updated successfully.');


    }

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

       
        return view('admin.resetPassword');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */

        $user = Auth::user();
    
        if (!Hash::check($request->old_password, $user->password)) {
            // Old password does not match
            return back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }
    if($request->new_password === $request->confirm_password){

    
        $user->password = Hash::make($request->new_password);
        $user->save();
    
        return redirect()->route('admin.index')->with('success', 'Password updated successfully.');
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
         /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->delete();
        return redirect('/');
    }

    public function search(Request $request){
       if($search = $request->student_search) {

 $students = Student::where('name', 'LIKE', "%{$search}%")
        ->orWhere('student_id', 'LIKE', "%{$search}%")
        ->get();
        
        return view('student.search', compact('students'));

       }
      if ($search = $request->book_search) {
        $books = Book::where('name', 'LIKE', "%{$search}%")
        ->orWhere('author', 'LIKE', "%{$search}%")
        ->get();
       

        return view('book.search', compact('books'));
      }
    
       
    }

}
