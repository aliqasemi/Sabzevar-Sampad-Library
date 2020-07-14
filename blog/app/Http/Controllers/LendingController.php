<?php

namespace App\Http\Controllers;

use App\Http\Requests\lendingRequest;
use App\lending;
use App\User;
use App\book ;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Mining;

class LendingController extends Controller
{
    //
    public function add_lending_form(book $book){
        $mining = new Mining();
        $recommendation = $mining->DFS_Searching() ;
        $data = $recommendation[0] ;
        $data = explode('-' , $data);
        $query = $data[1] ;
        $dec = $data[2] ;
        if (!strcmp($dec , 'subject')){
            $result = book::where('subject' , $query)->get() ;
        }
        else if (!strcmp($dec , 'father_job')){
            $result = book::join('users' , function ($join){
                $join->on('users.id' , '=' , 'lendings.user_id');
            })
                ->select('book.*')
                ->get()->where('father_job' , $query) ;
        }
        else{
            $result = book::join('users' , function ($join){
                $join->on('users.id' , '=' , 'lendings.user_id');
            })
                ->select('book.*')
                ->get()->where('grade' , $query) ;
        }
        return view('add_lending_form' , compact('user' , 'book' , 'result')) ;
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

    public function any_data(){
        return DataTables::of(
            lending::join('books' , function ($join){
                $join->on('books.id' , '=' , 'lendings.book_id');
            })
                ->select('books.name' , 'ban_status' , 'return_date' , 'lending_date' , 'lendings.id')
                ->get()->where('ban_status' , 2)
        )->make(true) ;
    }

    public function retrun_list(){
        $data = lending::where('ban_status' , 2)->get() ;
        return view('return_list' , compact('data')) ;
    }

    public function order_list ()
    {
        $data = lending::where('ban_status' , 0)->get() ;
        return view('order_list' , compact('data')) ;
    }

    public function user_order_list (User $user)
    {
        $data = lending::join('users' , function ($join){
           $join->on('users.id' , '=' , 'lendings.user_id');
        })
            ->select('lendings.*')
            ->get()->where('ban_status' , 0)->where('user_id' , $user->id);
        return view('order_list' , compact('data')) ;
    }

    public function user_lending_list (User $user)
    {
        $data = lending::join('users' , function ($join){
            $join->on('users.id' , '=' , 'lendings.user_id');
        })
            ->select('lendings.*')
            ->get()->where('ban_status' , 1)->where('user_id' , $user->id);
        return view('lending_list' , compact('data')) ;
    }

    public function user_return_list (User $user)
    {
        $data = lending::join('users' , function ($join){
            $join->on('users.id' , '=' , 'lendings.user_id');
        })
            ->select('lendings.*')
            ->get()->where('ban_status' , 2)->where('user_id' , $user->id);
        return view('return_list' , compact('data')) ;
    }

    public function lending_detail(lending $lending){
        return view('lending_detail' , compact('lending')) ;
    }

    public function retrun_detail(lending $lending){
        return view('return_detail' , compact('lending')) ;
    }

    public function order_detail(lending $lending){
        return view('order_details' , compact('lending')) ;
    }

    public function update_lending_form(lending $lending){
        return view('update_lending_form' , compact('user' , 'books' , 'lending')) ;
    }

    public function return_lending_form(lending $lending){
        return view('return_lending_form' , compact('user' , 'books' , 'lending')) ;
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

    public function lending_return(lending $lending , lendingRequest $request){
        $ban_status = $lending->ban_status ;
        if ($ban_status == 1){
            $ban_status = 2 ;
            $lending->update([
                'book_id' =>$request['book_id'] ,
                'ban_status' => $ban_status ,
                'user_id' => $lending->user_id ,
                'lending_date' =>$request['lending_date'] ,
                'return_date' =>$request['return_date'] ,
            ]) ;
        }
        $book = book::find($request['book_id']) ;
        $book->update([
            'lended' => 1 ,
        ]) ;
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
