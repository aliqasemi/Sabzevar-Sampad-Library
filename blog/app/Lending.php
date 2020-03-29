<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lending extends Model
{
    //
    protected $fillable = [
        'book_id', 'user_id', 'lending_date', 'return_date' , 'ban_status'
    ];
}
