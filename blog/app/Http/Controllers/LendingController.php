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

    public function lending_list(){
        $data = lending::where('ban_status' , 1)->get() ;
        return view('lending_list' , compact('data')) ;
    }

    public function order_list ()
    {
        $data = lending::where('ban_status' , 0)->get() ;
        return view('order_list' , compact('data')) ;
    }

    public function lending_detail(lending $lending){
        return view('lending_detail' , compact('lending')) ;
    }

    public function order_detail(lending $lending){
        return view('order_details' , compact('lending')) ;
    }

    public function update_lending_form(lending $lending){
        return view('update_lending_form' , compact('user' , 'books' , 'lending')) ;
    }

    public function lending_update(lending $lending , lendingRequest $request){
        $ban_status = $lending->ban_status ;
        if ($ban_status == 0){
            $ban_status = 1 ;
            $lending->update([
                'book_id' =>$request['book_id'] ,
                'ban_status' => $ban_status ,
                'user_id' => $lending->user_id ,
                'lending_date' =>$request['lending_date'] ,
                'return_date' =>$request['return_date'] ,
            ]) ;
        }
        else{
            $lending->update($request->all()) ;
        }
        return redirect('/home') ;
    }

    public function Lending_delete(lending $lending){
        $book = book::find($lending->book_id) ;
        $book->update([
            'lended' => 1 ,
        ]) ;
        $lending->delete() ;
        return redirect('/lending-list') ;
    }

    public function order_delete(lending $lending){
        $book = book::find($lending->book_id) ;
        $book->update([
            'lended' => 1 ,
        ]) ;
        $lending->delete() ;
        return redirect('/lending-list') ;
    }

}
