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
        $access = User::where('id' , $request['user_id'])->value('user_type') ;
        if ($lended == 1){
            $lended = 0 ;
            if ($access == 'admin'){
                lending::create([
                    'book_id' =>$request['book_id'] ,
                    'user_id' =>$request['user_id'] ,
                    'lending_date' =>$request['lending_date'] ,
                    'return_date' =>$request['return_date'] ,
                    'ban_status' => 1
                ]);
            }
            else{
                lending::create([
                    'book_id' =>$request['book_id'] ,
                    'user_id' =>$request['user_id'] ,
                    'lending_date' =>$request['lending_date'] ,
                    'return_date' =>$request['return_date'] ,
                    'ban_status' => 0
                ]);
            }
            $book = book::find($request['book_id']) ;
            $book->update([
                'lended' => $lended ,
            ]) ;
            return redirect('/home') ;
        }
    }

    public function lending_list(User $user){
        $data = lending::get() ;
        return view('lending_list' , compact('data')) ;
    }

    public function update_lending_form(lending $lending){
        return view('update_lending_form' , compact('user' , 'books' , 'lending')) ;
    }

    public function lending_update(lending $lending , lendingRequest $request){
        $lended = book::where('id' , $request['book_id'])->value('lended') ;
        if ($lended == 0){
            $lended = 1 ;
            $lending->update($request->all()) ;
            $book = book::find($request['book_id']) ;
            $book->update([
                'lended' => $lended ,
            ]) ;
        }
        return redirect('/home') ;
    }

}
