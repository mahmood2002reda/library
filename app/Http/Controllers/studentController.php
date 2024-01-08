<?php

namespace App\Http\Controllers;
use App\Models\Book;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students=Student::get();
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */

     protected function getMessages()
    {
        return $messages = [
            'name.required' => 'Name is required.',
            'name.max' => 'Name should not exceed 100 characters.',
            'name.unique' => 'Name already exists.',
            'student_id.required' => 'student_id is required.',
            'student_id.numeric' => 'student_id should be a number.',
           
        ];
    }

    protected function getRules()
    {
        return $rules = [
            'name' => 'required|max:100|unique:students,name',
            'student_id' => 'required|numeric|unique:students,student_id',
           

        ];
    }
    public function store(Request $request)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
    
        Student::create([
            'name' => $request->name,
            'student_id' => $request->student_id
        ]);
    
        return redirect()->route('student.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student=Student::where('id',$id)->first();
        
        return view('student.show', compact('student')) ;    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student=Student::find($id);
        $student->update([
            'name'=>$request->name,
            'student_id' => $request->student_id
        ]);

        return redirect()->route('student.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    
        Student::destroy($id);
        return redirect()->route('student.index');
    }
   
}
