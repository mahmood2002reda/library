<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
        'name',
        'price',
        'author',
        'category',
        'description',
        'image'
        

    ];
    use HasFactory;

    
    public function student()
    {
        return $this->belongsToMany(Student::class, 'student_book', 'book_id', 'student_id')
            ->withPivot('borrow_date', 'return_date');
    }
}
