<?php

namespace App\Http\Controllers;
use App\AgentCustomer;
use App\Receiver;
use App\Bank;
use Auth;
use App\Http\Requests\ReceiverRequest;
use Illuminate\Http\Request;

class AgentCustomerReceiversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
         
        $receivers = Receiver::where('agent_customer_id', $id)->take(10)->get();
        return view('agent.customers.receivers.index',compact('receivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
         //
        $bank = Bank::where('status', 'b')->pluck('name','name')->toArray();
        
        return view('agent.customers.receivers.create',compact('bank','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceiverRequest $request)
    {
        //
         $user_id = Auth::user()->id;
        $data = $request->all();
        $data['user_id'] = $user_id;
         Receiver::create($data);
        return redirect('agent/customer');
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
        $receiver = Receiver::findorfail($id);
        $bank = Bank::where('status', 'b')->pluck('name','name')->toArray();
        return view('agent.customers.receivers.edit',compact('bank','receiver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReceiverRequest $request, $id)
    {
        //
         $receiver = Receiver::findorfail($id);
         $data = $request->all();
         $receiver->whereId($id)->first()->update($data);
         return redirect('agent/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $receiver = Receiver::findorfail($id)->delete();

         \Session::flash('message','Successfully Deleted');
         return redirect()->back();
    }

    /* __________ Api _________ */

    public function showCustomerReceivers(){

        $receivers = Receiver::where('agent_customer_id', $id)->take(10)->get();
        return view('agent.customers.receivers.index',compact('receivers'));
    
    }
}
