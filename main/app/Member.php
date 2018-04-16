<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $fillable = [
    	'user_id',
    	'title',
    	'fname',
    	'lname',
    	'mname',
    	'dob',
    	'email',
    	'phone',
    	'mobile',
    	'postcode',
    	'address',
    	'photo_id',

    ];
}
