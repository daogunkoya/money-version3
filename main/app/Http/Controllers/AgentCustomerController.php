<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgentCustomer;
use App\User;
use App\Address;
use App\Photo;
use App\Http\Requests\AgentCustomerRequest;
use Carbon\Carbon;

class AgentCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $trans_result = AgentCustomer::where('user_id', '1')->take(10)->get();
        return view('agent.customers.index',compact('trans_result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
        return view('agent.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkemptyadress($input){
             $input['number'] = $input['number'] ==""?"": $input['number'];
            $input['address'] = $input['address'] ==""?$input['search']: $input['address'];
            $input['town'] =   $input['town'] ==""?"": $input['town'];
            $input['county'] = $input['county'] ==""?"": $input['county'];
            $input['country'] = $input['country'] ==""?"": $input['country'];
            $input['address'] =  $input['number']. " ".$input['address']. " ".$input['town']." ".$input['county']." ".$input['country'];
            return $input;

    }

    public function ProcessPhoto($request){
          if($file_identity = $request->file('identity_proof') || $file_address = $request->file('address_proof') ){  
                if($file_identity = $request->file('identity_proof')){
                       $identity_name = time().$file_identity->getClientOriginalName();
                       $file_identity->move('images',$identity_name);
                     }
                if($file_address = $request->file('address_proof')){
                       $address_name = time().$file_address->getClientOriginalName();
                       $file_address->move('images',$address_name);
                     }
                     $identity_name= isset($identity_name)?$identity_name:"";
                     $address_name= isset($address_name)?$address_name:"";


            $photo = Photo::create(['identity_proof'=>$identity_name,'address_proof'=>$address_name]);
              $input['photo_id'] = $photo->id;

                return $photo->id;
            }

           
    }
    public function store(AgentCustomerRequest $request)
    {
           
           //check for empty inputs
            $input = $request->all();
            $input['name']= $input['fname']." ".$input['lname'];
            $input = $this->checkemptyadress($input);
             
            $input['photo_id'] = '1';
            $user = User::findorfail(1);
            
            $address = Address::create($input);

            $input['address_id'] = $address->id;

            $user->agentcustomer()->create($input);
            \Session::flash('message','Your new Customer sucessfully created');
             return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
        //
       
        $agentcustomer = AgentCustomer::findorfail($id);
        $address = $agentcustomer->address()->first();
        return view('agent.customers.edit',compact('agentcustomer','address'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgentCustomerRequest $request, $id)
    {
        //
            $input = $request->all();
            $input = $this->checkemptyadress($input);

            if($file_identity = $request->file('identity_proof') || $file_address = $request->file('address_proof') ){ 
                    $input['photo_id'] = $this->ProcessPhoto($request);
                }

            $agentcustomer = AgentCustomer::findorfail($id);
             $user = User::findorfail(1);
           Address::whereId($agentcustomer->address_id)->first()->update($input);
            $user->agentcustomer()->whereId($id)->first()->update($input);


           // $agentcustomer->update($input);
            \Session::flash('message','successfully updated');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //

        AgentCustomer::findorfail($id)->delete();
         \Session::flash('message','Successfully Deleted'); 
        return redirect('/');
    }
}
