<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books=Book::get();
       
        return view('book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

       

        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

                $file_name = $this->saveImage($request->image, 'images/books');

        $rules = $this->getRules();
        $messages = $this->getMessages();
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Book::create([
            'name' => $request->name,
            'price' => $request->price,
            'author' => $request->author,
            'category' => $request->category,
            'description' => $request->description,
            'image'=>$file_name,
        ]);
        
        
        return redirect()->route('book.index');
    }
    protected function saveImage($photo, $folder)
    {
        // Save photo in folder
        $file_extension = $photo->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = $folder;
        $photo->move($path, $file_name);

        return $file_name;
    }

    protected function getMessages()
    {
        return $messages = [
            'name.required' => 'Name is required.',
            'name.max' => 'Name should not exceed 100 characters.',
            'name.unique' => 'Name already exists.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price should be a number.',
            'author.required' => 'author is required.',
        ];
    }

    protected function getRules()
    {
        return $rules = [
            'name' => 'required|max:100|unique:books,name',
            'price' => 'required|numeric',
            'author' => 'required',
            'category' => 'required',
            'description' => 'required',


        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book=Book::where('id',$id)->first();
        
        return view('book.show', compact('book')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $image = $book->image;
       
        $file_name = $image; 
        if ($request->hasFile('image')) {
            Storage::delete($book->image);
            $file_name = $this->saveImage($request->file('image'), 'images/books');
        }
    
        $book->update([
            'name' => $request->name,
            'price' => $request->price,
            'author' => $request->author,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $file_name,
        ]);
    
        return redirect()->route('book.index');
    }

        // قم بتحديث باقي الحقول الأخرى في الكتاب
   
     
    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect()->route('book.index');

    }
}