<?php

namespace App\Http\Controllers;
use Auth;
use App\Receiver;
use App\Bank;
use App\Http\Requests\ReceiverRequest;
use Illuminate\Http\Request;

class CustomerReceiversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::user()->id;
        $receivers = Receiver::where('user_id', $id)->take(10)->get();
        return view('customer.receivers.index',compact('receivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $bank = Bank::where('status', 'b')->pluck('name','name')->toArray();
        return view('customer.receivers.create',compact('bank'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceiverRequest $request)
    {
       
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;;
        $data['agent_customer_id'] = "";
         Receiver::create($data);
         \Session::flash('message','New Receiver Succesfully Added');
        return redirect('customer/beneficiaries');
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
        return view('customer.receivers.edit',compact('bank','receiver'));
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
         return redirect('customer/beneficiaries');
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
}
