<?php

namespace App\Http\Controllers;
use App\Transaction;
use Auth;
use App\Bank;
use Illuminate\Http\Request;

class AgentTransactionsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        //
        $user = Auth::user();
        $transactions = Transaction::where('user_id',$user->id)->paginate(5);
        return view('transactions.agent.index',compact('user','transactions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            
        $customer = Auth::user()->agentcustomer()->pluck('name','id')->toArray();
        return view('transactions.agent.create',compact('customer'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $bank = Bank::where('status', 'b')->pluck('name','name')->toArray();
        $transaction = Transaction::findorfail($id);
        $customer = $transaction->agentCustomer;
        return view('transactions.agent.edit',compact('transaction','customer','bank'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input  = $request->all();
        Transaction::whereId($id)->first()->update($input);
        \Session::flash('message','Transaction Successfully Updated');
        return redirect('/agent/customer-transactions');
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
        $transaction = Transaction::findorfail($id);
        $transaction->delete();
        \Session::flash('message','Transaction Successfully Deleted');
        return redirect('/agent/customer-transactions');
    }
}
