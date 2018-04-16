<?php
use App\User;
use App\AgentCustomer;
use App\Receiver;
use App\Transaction;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' =>'isLogin'], function(){
	Route::get('/', function () {
	    $customers = User::findorfail(1)->agentcustomer()->take(10)->get();
	    $trans_result = User::findorfail(1)->transaction()->take(10)->get();
	     return view('agent.index',compact('customers','trans_result'));
		});
});

// Route::resource('agent/customers', 'AgentCustomerController');

Route::group(['middleware' =>'agent'], function(){
			Route::prefix('agent/')->group(function () {
		    	Route::resource('customer', 'AgentCustomerController');
		    	Route::resource('customer-transactions', 'AgentTransactionsController');
		});

});

Route::group(['middleware' =>'customer'], function(){
			Route::prefix('customer/')->group(function () {
		    	Route::resource('beneficiaries', 'CustomerReceiversController');
		    	Route::resource('transactions', 'CustomerTransactionsController');
		});

});



Route::get('/agent/customer/{id}/receivers/list', ['as'=>'receiver.index', 'uses'=>'AgentCustomerReceiversController@index']);

Route::get('/agent/customer/{id}/create', ['as'=>'receiver.create', 'uses'=>'AgentCustomerReceiversController@create']);

Route::get('/agent/customer-transactions/{id}/receivers', ['as'=>'receivers.index', function($id){
		return response()->json(Receiver::where('agent_customer_id',$id)->get());
}]);

Route::get('/agent/customer-transactions/{id}/receiver', ['as'=>'receiver.index', function($id){
		return response()->json(Receiver::whereId($id)->first());
}]);

Route::get('/agent/customer-transactions/{amount}/findratecommission', ['as'=>'receiver.calculation', function($amount){
		return response()->json(['rate'=>Auth::user()->rate(),'commission'=>Auth::user()->commission($amount)]);
}]);

Route::prefix('agent/customer')->group(function () {
 	Route::resource('receivers', 'AgentCustomerReceiversController');
 });
 Route::resource('transactions', 'TransactionsController');
 


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
