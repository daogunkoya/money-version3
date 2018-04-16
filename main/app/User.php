<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'fname','lname','email',
        'phone','mobile','postcode',
        'address',
        'is_active','dob','title','mname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function type(){

        $role = Auth::user()->role;
        return $role['0']->name;
    }

     public function address(){
        return $this->hasMany('App\Address');
    }
    public function member(){
        return $this->hasMany('App\Member');
    }

     public function agentcustomer(){
        return $this->hasMany('App\AgentCustomer');
    }

     public function transaction(){
        return $this->hasMany('App\Transaction');
    }

    public function role(){
        return $this->belongsToMany('App\Role');
    }

    public function isCustomer(){

        $role = Auth::user()->role;
        if($role['0']->name == "customer" && $this->is_active == 1){
            return true;
        }
        return false;
    }

    public function isAgent(){

        $role = Auth::user()->role;
        if($role['0']->name == "agent" && $this->is_active == 1){
            return true;
        }
        return false;
    }

    public function isAdmin(){
        $role = Auth::user()->role;
        if($role['0']->name == "admin" && $this->is_active == 1){
            return true;
        }
        return false;
    }
//find agent customers transactions
    public function agentTransactions(){
        return $this->hasMany('App\Transaction');
    }
//find user todays rate
    public function rate(){ 
        $rate = Rate::where('user_id',$this->id)->orderBy('id','desc')->pluck('rate')->first();
        $rate = isset($rate)?$rate:Rate::where('user_id',0)->orderBy('id','desc')->pluck('rate')->first();;
        return $rate;
    }
//find user commission
    public function commission($amount){
        $userCommission = Commission::where('user_id',$this->id)->whereRaw
                                    ('? between start_from and end_at', [$amount])->pluck('value')->first();

        $defaulCommission = Commission::where('user_id',0)->whereRaw
                                    ('? between start_from and end_at', [$amount])->pluck('value')->first();

        $commission = isset($userCommission)?$userCommission:$defaulCommission;
            return $commission;
    }
}
