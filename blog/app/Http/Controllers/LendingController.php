<?php

namespace App\Http\Controllers;

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
}
