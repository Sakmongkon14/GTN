<?php

use App\Http\Controllers\Dropdowncontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', [Admincontroller::class, 'index'])->name('blog'); 
Route::get('edit/{id}', [Admincontroller::class, 'edit'])->name('edit'); 
Route::post('update/{id}', [Admincontroller::class,'update'])->name('update');

Route::get('add', [Admincontroller::class,'add'])->name('add');
Route::post('insert', [Admincontroller::class,'insert'])->name('insert');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('are', [Dropdowncontroller::class, 'region'])->name('are');


