<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentCustomer extends Model

{
    //

    //public $timestamps = false;
    protected $table = "agent_customers";
     protected $fillable = ['user_id','fname','lname','mname','name','email','mobile','phone','dob','address','postcode','title','address_id','photo_id'

     ];

   // protected $guarded = ['hash'];


	public function user(){
		return $this->belongsTo('App\User');
	}

	public function address(){			
		return $this->belongsTo('App\Address');
	}

	public function photo(){
		return $this->belongsTo('App\photo');
	}

	public function receiver(){
		return $this->hasMany('App\Receiver');
	}

	

	

}


