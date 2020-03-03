<?php

namespace App\Http\Controllers;

use App\book;
use App\Http\Requests\bookRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    //





    public function add_book_form(){
        return view('add_book_form') ;
    }

    public function add_book(bookRequest $request){

            book::create([
            'name' =>$request['name'] ,
            'author' =>$request['author'] ,
            'subject' =>$request['subject'] ,
            'shabak' =>$request['shabak'] ,
            'lended' => 1
        ]);


        return redirect('/home') ;

    }



}
