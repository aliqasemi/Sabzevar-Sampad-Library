<?php

namespace App\Http\Controllers\API;

use App\book;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class BookController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') || Gate::allows('isUser')){
            $book = book::paginate() ;
            if(!$book){
                return response()->json([
                    'message' => 'not found book!' ,

                ] , 404) ;
            }
            else
                return response()->json($book , 200) ;
        }
        else{
            return response()->json([
                'message' => 'Unauthorized!' ,

            ] , 401) ;
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //

        $validation = $this -> getValidationFactory() -> make($request->all() ,[
            'name' => ['required', 'string', 'max:100'],
            'author' => ['required', 'string', 'max:100'],
            'subject' => [ 'string', 'max:100'],
            'shabak' => ['string', 'max:100' , 'unique:books'] ,
        ]);

        if ($validation->fails()){
            return response() -> json(['message' => 'invalid data'] , 400) ;
        }

        //authorized type checking...

        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin')){
            $book = new book() ;
            $book->name = $request['name'] ;
            $book->author = $request['author'] ;
            $book->subject = $request['subject']  ;
            $book->shabak = $request['shabak'] ;
            $book->lended = 1 ;

            if ($book->save())
                return response()->json(['message' , 'save seccussfully'] , 200) ;
            else
                return response()->json(['message' , 'error!'] , 404) ;
        }
        else{
            return response()->json([
                'message' => 'Unauthorized!' ,

            ] , 401) ;
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
        $book = book::find($id) ;
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') || Gate::allows('isUser')){
            if (!$book){
                return response()->json([
                    'message' => 'not found book!' ,

                ] , 404) ;
            }
            else
                return response()->json($book , 200) ;
        }
        else{
            return response()->json([
                'message' => 'Unauthorized!' ,

            ] , 401) ;
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /*public function edit($id)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //



        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin')){


            $book = book::find($id) ;
            $book->name = $request['name'] ;
            $book->author = $request['author'] ;
            $book->subject = $request['subject']  ;
            $book->shabak = $request['shabak'] ;
            $book->lended = 1 ;


            if ($book->save())
                return response()->json(['message' , 'update seccussfully'] , 200) ;
            else
                return response()->json(['message' , 'error!'] , 404) ;

        }

        else{
            return response()->json([
                'message' => 'Unauthorized!' ,

            ] , 401) ;
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin')){
            if (book::find($id)){
                book::find($id)->delete() ;
                return response()->json(['message' , 'delete successfully'] , 200) ;
            }
            else
                return response()->json(['message' , 'error!'] , 404) ;
        }

        else{
            return response()->json([
                'message' => 'Unauthorized!' ,

            ] , 401) ;
        }
        }

}
