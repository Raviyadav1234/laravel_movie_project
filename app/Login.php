<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
     protected $fillable =['email','password'];

    public $timestamps = false; //When Timestamps is Not Available
}
