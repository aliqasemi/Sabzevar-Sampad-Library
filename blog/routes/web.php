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

//book schema

Route::get('/add-book-form', 'BookController@add_book_form');

Route::post('/add-book', 'BookController@add_book');

Route::get('/book_list' , 'BookController@book_list') ;

Route::get('/book-detail/{book}' , 'BookController@book_detail') ;

Route::get('/book_delete/{book}' , 'BookController@book_delete') ;

Route::get('/book_update_form/{book}' , 'BookController@update_book_form') ;

Route::patch('/book_update/{book}' , 'BookController@book_update') ;

//lending schema

Route::get('/add-lending-form', 'LendingController@add_lending_form');

Route::post('/add-lending','LendingController@add_lending');

Route::get('/lending-list/', 'LendingController@lending_list');

Route::get('/order-list/', 'LendingController@order_list');

Route::get('/lending-detail/{lending}', 'LendingController@lending_detail');

Route::get('/order-detail/{lending}', 'LendingController@order_detail');

Route::get('/lending_update_form/{lending}', 'LendingController@update_lending_form');

Route::patch('/lending_update/{lending}' , 'lendingController@lending_update') ;

Route::get('/lending_delete/{lending}' , 'LendingController@Lending_delete') ;

Route::get('order_delete/{lending}' , 'LendingController@order_delete') ;
