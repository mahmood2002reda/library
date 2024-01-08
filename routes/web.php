<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Students\clintController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [adminController::class, 'index'])->name('admin.index');
    Route::get('/profile', [adminController::class, 'profile'])->name('admin.profile');
    Route::get('profile/password/reset', [adminController::class, 'edit'])->name('admin.password.reset');
    Route::put('profile/reset/update', [adminController::class, 'update'])->name('admin.password.update');
    Route::get('profile/info/reset', [adminController::class, 'edit_info'])->name('admin.info.reset');
    Route::put('profile/info/update', [adminController::class, 'update_info'])->name('admin.info.update');
    Route::delete('profile/info/delete', [adminController::class, 'destroy'])->name('admin.info.delete');
    Route::get('/book', [bookController::class, 'index'])->name('book.index');
    Route::get('book/edit/{id}', [bookController::class, 'edit'])->name('book.edit');
    Route::get('book/show/{id}', [bookController::class, 'show'])->name('book.show');
    Route::delete('book/delete/{id}', [bookController::class, 'destroy'])->name('book.delete');
    Route::get('book/create', [bookController::class, 'create'])->name('book.create');
    Route::post('book/store', [bookController::class, 'store'])->name('book.store');
    Route::put('book/update/{id}', [bookController::class, 'update'])->name('book.update');
    Route::get('/student', [studentController::class, 'index'])->name('student.index');
    Route::get('student/edit/{id}', [studentController::class, 'edit'])->name('student.edit');
        Route::get('student/show/{id}', [studentController::class, 'show'])->name('student.show');
    Route::delete('student/delete/{id}', [studentController::class, 'destroy'])->name('student.delete');
    Route::get('student/create', [studentController::class, 'create'])->name('student.create');
    Route::post('student/store', [studentController::class, 'store'])->name('student.store');
    Route::put('student/update/{id}', [studentController::class, 'update'])->name('student.update');
    Route::get('search', [adminController::class, 'search'])->name('search');

});




Route::group(['prefix' => 'students', ], function ($id) {

Route::get('/home', [clintController::class, 'index'])->name('student.home');;
Route::get('book/detail/{id}', [clintController::class, 'book_details'])->name('book.detail');
Route::post('book/borrow/{id}', [clintController::class, 'borrow'])->name('book.borrow');

Route::get('/mybook', [clintController::class, 'my_book'])->name('book.mybook');;
Route::get('book/return/{id}', [clintController::class, 'Return_shelf'])->name('book.Return_shelf');
Route::get('/profile', [clintController::class, 'profile'])->name('student.profile');
Route::get('profile/password/reset', [clintController::class, 'edit'])->name('student.password.reset');
Route::put('profile/reset/update', [clintController::class, 'update'])->name('student.password.update');
Route::get('profile/info/reset', [clintController::class, 'edit_info'])->name('student.info.reset');
Route::put('profile/info/update', [clintController::class, 'update_info'])->name('student.info.update');
Route::delete('profile/info/delete', [clintController::class, 'destroy'])->name('student.info.delete');
Route::get('search', [clintController::class, 'search'])->name('search.book');

});

Route::get('/students/login', [CustomAuthController::class, 'login'])->name('student.login');
Route::post('/students/login', [CustomAuthController::class, 'checkStudentlogin'])-> name('save.student.login');