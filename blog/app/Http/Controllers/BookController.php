<?php

namespace App\Http\Controllers;

use App\book;
use App\Http\Requests\bookRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables ;
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

    public function any_data(){
        return DataTables::of(book::query())->make(true) ;
    }

    public function book_list(){
        return view('book_list') ;
    }


    public function book_detail(book $book){
        return view('book_detail' , compact('book')) ;
    }

    public function book_delete(book $book){
        $book->delete() ;
        return redirect('/book_list') ;
    }

    public function update_book_form(book $book){
        return view('update_book_form' , compact('book')) ;
    }

    public function book_update(book $book , bookRequest $request){
        $book->update($request->all()) ;
        return redirect('/book_list') ;
    }



}
