<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    //
    protected $fillable = [
    	'fname',
    	'lname',
    	'user_id',
    	'agent_customer_id',
    	'phone',
    	'bank',
    	'transfer_type',
    	'identity_type',
    	'account_number',

    ];

    public function agentcustommer(){
    	return $this->belingsTo('App\AgentCustomer');
    }
}
