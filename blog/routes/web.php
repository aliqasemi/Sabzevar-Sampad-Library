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

use App\User;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    if (User::where('user_Type' , 'superAdmin')->get()->count() == 0){
        User::create([
            'name' => 'ali',
            'email' => 'qasemi4245qq@gmail.com',
            'password' => Hash::make('123456789'),
            'first_name' => 'علی',
            'last_name' => 'قاسمی',
            'father_name' => 'علی اکبر',
            'address' => 'قم',
            'father_job' => 'بازنشسته',
            'mobile_number' => '09195884064',
            'father_mobile_number' => '09127540701',
            'registery_date' => date("Y-m-d h:i:s"),
            'expiration_date' => null ,
            'grade' => '1' ,
            'ban_status' => 1 ,
            'user_type' => 'superAdmin'
        ]);
    }
    return view('welcome');
});

Auth::routes();

Route::get('/test', 'HomeController@test');

Route::get('/home', 'HomeController@index')->name('home');

//book schema

Route::get('/add-book-form/', 'BookController@add_book_form');

Route::post('/add-book', 'BookController@add_book');

Route::get('/book_list' , 'BookController@book_list') ;

Route::get('/book_data' , 'BookController@any_data') ;

Route::get('/book-detail/{book}' , 'BookController@book_detail') ;

Route::get('/book_delete/{book}' , 'BookController@book_delete') ;

Route::get('/book_update_form/{book}' , 'BookController@update_book_form') ;

Route::patch('/book_update/{book}' , 'BookController@book_update') ;

//lending schema

Route::get('/add-lending-form/{book}', 'LendingController@add_lending_form');

Route::post('/add-lending','LendingController@add_lending');

Route::get('/lending-list/', 'LendingController@lending_list');

Route::get('/return-list/', 'LendingController@retrun_list');

Route::get('/order-list/', 'LendingController@order_list');

Route::get('/lending-detail/{lending}', 'LendingController@lending_detail');

Route::get('/return-detail/{lending}', 'LendingController@retrun_detail');

Route::get('/order-detail/{lending}', 'LendingController@order_detail');

Route::get('/lending_update_form/{lending}', 'LendingController@update_lending_form');

Route::get('/lending_return/return_form/{lending}', 'LendingController@return_lending_form');

Route::patch('/lending_update/{lending}' , 'lendingController@lending_update') ;

Route::patch('/lending_return/{lending}' , 'lendingController@lending_return') ;

Route::get('/lending_delete/{lending}' , 'LendingController@Lending_delete') ;

Route::get('order_delete/{lending}' , 'LendingController@order_delete') ;

Route::get('/return_data' , 'LendingController@any_data') ;


//User schema

Route::get('/user_list' , 'Auth\RegisterController@User_list') ;

Route::get('/user_data' , 'Auth\RegisterController@any_data') ;

Route::get('/user-detail/{user}' , 'Auth\RegisterController@User_detail') ;

Route::get('/user_update_form/{user}' , 'Auth\RegisterController@update_user_form') ;

Route::patch('/user_update/{book}' , 'Auth\RegisterController@user_update') ;

Route::get('/user_delete/{user}' , 'Auth\RegisterController@user_delete') ;

Route::get('/order_customer/{user}' , 'LendingController@user_order_list') ;

Route::get('/lending_customer/{user}' , 'LendingController@user_lending_list') ;

Route::get('/return_customer/{user}' , 'LendingController@user_return_list') ;


//page api react for book list

Route::view('/api_book_list', 'Api_pages/book_list');
