<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add-book-form', 'BookController@add_book_form');


Route::post('/add-book', 'BookController@add_book');

Route::get('/book_list' , 'BookController@book_list') ;

Route::get('/book-detail/{book}' , 'BookController@book_detail') ;

Route::get('/branches/branch_delete/{branches}' , 'BranchesController@branch_delete') ;
