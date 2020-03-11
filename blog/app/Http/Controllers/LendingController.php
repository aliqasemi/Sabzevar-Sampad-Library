<?php

namespace App\Http\Controllers;

use App\Http\Requests\lendingRequest;
use App\lending;
use App\User;
use App\book ;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    //
    public function add_lending_form(){
        $books = book::get() ;
        return view('add_lending_form' , compact('user') , compact('books')) ;
    }

    public function add_lending(lendingRequest $request){
        $lended = book::where('id' , $request['book_id'])->value('lended') ;
        echo $lended ;
        if ($lended == 1){
            $lended = 0 ;
            lending::create([
                'book_id' =>$request['book_id'] ,
                'user_id' =>$request['user_id'] ,
                'lending_date' =>$request['lending_date'] ,
                'return_date' =>$request['return_date'] ,
            ]);
            $book = book::find($request['book_id']) ;
            $book->update([
                'lended' => $lended ,
            ]) ;

        }
    }
}
