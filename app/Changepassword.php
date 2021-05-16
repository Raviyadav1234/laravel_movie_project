<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Changepassword extends Model
{
    //
    protected $fillable =['login_id','password'];

    public $timestamps = false; //When Timestamps is Not Available
}
