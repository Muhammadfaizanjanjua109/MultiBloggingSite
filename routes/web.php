<?php

use App\Http\Middleware\adminmiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/createblog', function () {
    return view('createblog');
});


Route::get('/admin', 'App\Http\Controllers\BlogsController@admin')->middleware('auth');

//softdelete blogs
Route::get('/trash','App\Http\Controllers\BlogsController@trash')->name('trash');
Route::get('/restore/{id}','App\Http\Controllers\BlogsController@restore')->name('restore.blog');
Route::post('/pdelete/{id}','App\Http\Controllers\BlogsController@delete')->name('pdelete.blog');
//delete blogs
Route::delete('/Delete/{id}','App\Http\Controllers\BlogsController@delteblog')->name('delete.blog');
//edit

Route::get('/fp/{id}','App\Http\Controllers\BlogsController@editblog')->name('edit.blog');
//update
Route::patch('/fpu/{id}','App\Http\Controllers\BlogsController@update')->name('updatenew.blog');

//main views
Route::get('/', function () {
    return view('welcome');
});


Route::get('/update', function () {
    return view('update');
});
//fullpageview
Route::get('/fps/{id}','App\Http\Controllers\BlogsController@show')->name('send.blog');
Route::get('/showblogs','App\Http\Controllers\BlogsController@index');
Route::post('/sendblog','App\Http\Controllers\BlogsController@createblogs')->name('blogs.store');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';
//admin

Route::get('/admin','App\Http\Controllers\Admin@index')->name('admin')->middleware('admin');

