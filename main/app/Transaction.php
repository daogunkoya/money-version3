<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
'receipt_number',
'type',
'user_id',
'customer_id',
'sender_name',
'receiver_id',
'receiver_name',
'receiver_phone',
'amount',
'commission',
'agent_commission',
'exchange_rate',
'transfer_type',
'bank',
'account_number',
'identity',
'note',
'status'
    ]; 

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function agentCustomer(){
    	return $this->belongsTo('App\AgentCustomer','customer_id');
    }

    public function senderAddress(){
    	return $this->hasManyThrough('App\Address','App\AgentCustomer','customer_id');
    }


    //Attributes Assessors
    
    public function getSenderNameAttribute($value){
    	return ucFirst($value);
    }

    public function getReceiverNameAttribute($value){
    	return ucFirst($value);
    }

    public function getBankAttribute($value){
    	return ucFirst($value);
    }
    public function getTransferTypeAttribute($value){
    	return ucFirst($value);
    }

    public function getTotalAttribute(){
    	return number_format(($this->amount + $this->commission),2);
    }

    public function getLocalPaymentAttribute(){
    	return number_format(($this->amount * $this->exchange_rate),2);
    }
//Actual value of agent comssion  = agent % commission * commission
    public function getAgentCommissionAttribute($value){
    	return number_format(($this->commission * ($value / 100)),2);
    }
//business commision = commission - agent commsion
    public function getBusinessCommissionAttribute(){
    	return number_format(($this->commission - ($this->commission * ($this->agent_commission / 100))),2);
    }

    
}
