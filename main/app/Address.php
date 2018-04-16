<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //

    protected $table = "addresses";
    protected $fillable = [
    	'postcode','town','county','country','address'
    ];

    public function agentcustomer(){
    	return $this->hasOne('App\AgentCustomer');
    }
}
