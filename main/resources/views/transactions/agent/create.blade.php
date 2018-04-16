@extends('layouts.layout')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<div id="output1"></div>
			<h4>Send Money<i class="glyphicon glyphicon-send"></i></h4>
		</div>
		<div class="panel-body">
			
			{!! Form::open(['method'=>'POST', 'action'=>'AgentTransactionsController@store','file'=>true]) !!}

				<div class="row">
					<div class="col-md-6 col-md-offset-3">
<!--sender details--><div class="form-group">
							
						{!! Form::label('sender','Sender') !!}<span class="essential">*</span>
						{!! Form::select('senders',$customer,null,['class'=>'form-control','placeholder'=>'Senders','id'=>'senders']) !!}
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="form-group">
							{!! Form::label('SReceiver','Select Receiver') !!}<span class="essential">*</span>
							{!! Form::select('receivers',[2 =>'New Receiever'],null,['class'=>'form-control','placeholder'=>'Receivers','id'=>'receivers']) !!}
						</div>		
								
					</div>
				</div>
<!--Receivers--><div class="well">
					<div class="row">
						<div class="col-md-4 col-md-offset-1">
							<div class="form-group form-group-sm">
								{!! Form::label('Rfirstname',' Receiver First Name') !!}
								{!! Form::text('receiver_fname',null,['id'=>'receiver_fname', 'class'=>'form-control','placeholder'=>'Receiver First name','readonly'=>'readonly']) !!}
							</div>
							</div>
						<div class="col-md-4 col-md-offset-1">
							<div class="form-group form-group-sm">
								{!! Form::label('Rlastname','Receiver Last Name') !!}
								{!! Form::text('receiver_lname',null,['id'=>'receiver_lname', 'class'=>'form-control','placeholder'=>'Receiver Last name','readonly'=>'readonly']) !!}
							</div>
							</div>
					</div>
					<div class="row">
							<div class="col-md-4 col-md-offset-1">
								<div class="form-group form-group-sm">
									{!! Form::label('receiver_phone','Receiver Phone') !!}
									{!! Form::text('receiver_phone',null,['id'=>'receiver_phone', 'class'=>'form-control','placeholder'=>'Receiver phone','readonly'=>'readonly']) !!}
								</div>
							</div>
							<div class="col-md-4 col-md-offset-1">
								<div class="form-group form-group-sm">
									{!! Form::label('Transfer Option','Transfer Option') !!}
									{!! Form::text('transfer_option',null,['id'=>'Transfer_option', 'class'=>'form-control','placeholder'=>'transfer_option','readonly'=>'readonly']) !!}
								</div>
							</div>
					</div>
					<div class="row">
							<div class="col-md-4 col-md-offset-1">
								<div class="form-group form-group-sm">
									{!! Form::label('bank','Receiver Bank') !!}
									{!! Form::text('receiver_bank',null,['id'=>'receiver_bank', 'class'=>'form-control','placeholder'=>'Receiver Bank','readonly'=>'readonly']) !!}
								</div>
							</div>
							<div class="col-md-4 col-md-offset-1">
								<div class="form-group form-group-sm">
									{!! Form::label('receiver_accountno','Receiver Account Number') !!}
									{!! Form::text('receiver_accountno',null,['id'=>'receiver_accountno', 'class'=>'form-control','placeholder'=>'Receiver Account number ','readonly'=>'readonly']) !!}
								</div>
							</div>
				</div>
			</div>
<!--Transaction operation here-->
				<div class="row">
					<div class="col-md-3 col-md-offset-3">
						<div class="form-group">
							{!! Form::label('Pounds','Pounds &pound;') !!}
							{!! Form::radio('option','pounds',['id'=>'pounds']) !!}
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							{!! Form::label('Naira','Naira &#8358;') !!}
							{!! Form::radio('option','naira',true,['id'=>'naira']) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5 col-md-offset-3">
						<div class="form-group form-group-sm">
						{!! Form::label('Amount To Send','Amount To Send') !!}<span class="essential">*</span>
						{!! Form::text('amount',null,['id'=>'amount','class'=>'form-control','placeholder'=>'Enter Amount']) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5 col-md-offset-3">
						<div class="form-group form-group-sm">
							{!! Form::label('Commission','Commission') !!}
							{!! Form::text('commission',null,['id'=>'commission','class'=>'form-control','placeholder'=>'Commission','readonly'=>'readonly']) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5 col-md-offset-3">
						<div class="form-group form-group-sm">
							{!! Form::label('Total','Total') !!}
							{!! Form::text('total',null,['id'=>'total','class'=>'form-control','placeholder'=>'Total','readonly'=>'readonly']) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5 col-md-offset-3">
						<div class="form-group form-group-sm">
							{!! Form::label('Amount To Collect','Amount To Collect') !!}
							{!! Form::text('local_payment',null,['id'=>'local_payment','class'=>'form-control','placeholder'=>'Amount To Collect','readonly'=>'readonly']) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5 col-md-offset-3">
						<div class="form-group form-group-sm">
							<div class="form-group form-group-sm">
							{!! Form::label('Exchange Rate','Exchange Rate') !!}
							{!! Form::text('exchange_rate',Auth::user()->rate(),['id'=>'exchange_rate','class'=>'form-control','placeholder'=>'Exchange Rate','readonly'=>'readonly']) !!}
						</div>
						</div>
					</div>
				</div>
				<div class="row">
							{!! Form::submit('Submit',['class'=>'btn btn-primary col-md-12 btn-block']) !!}
				</div>
				
			</form>
		</div>
		
	</div>
				
@stop

@section('script')
		

@stop