@extends('layouts.layout')
@section('content')

		<div class="panel-border">
<!--Edit Transactions-->	
			<div class="row">
					<div class="col-md-8 col-md-offset-1">
						<h3>Sender Info</h3>
					</div>
			</div>
			<hr>
				

			{!! Form::model($transaction,['method'=>'PATCH', 'action'=> ['AgentTransactionsController@update',$transaction->id], 'files'=>true]) !!}
		  
		<div class="container">
			
			<div class="row">
<!--Sender-->	
				<div class="col-md-6">
					<div class="form-group form-group-sm">
						{!! Form::label('Sender Name', 'Sender Name') !!}
						{!! Form::text('sender_name', null, ['class'=>'form-control','readonly'=>'readonly'])!!}
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('Address', 'Address') !!}
						{!! Form::text('address', $transaction->agentCustomer->address, ['class'=>'form-control','readonly'=>'readonly'])!!}
					</div>

					<div class="form-group col-xs-6">
						{!! Form::label('Postcode', 'Postcode') !!}
						{!! Form::text('postcode', $transaction->agentCustomer->postcode, ['class'=>'form-control','readonly'=>'readonly'])!!}
					</div>
					<div class="form-group col-xs-6">
						{!! Form::label('Country', 'Country') !!}
						{!! Form::text('country', null, ['class'=>'form-control','readonly'=>'readonly'])!!}
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('Phone', '') !!}
						{!! Form::text('phone', $transaction->agentCustomer->phone, ['class'=>'form-control','readonly'=>'readonly'])!!}
					</div>
				</div>
<!--Receiver-->	
				<div class="col-md-6">
					<div class="form-group form-group-sm">
						{!! Form::label('Receiver Name', 'Receiver Name') !!}
						{!! Form::text('receiver_name', null, ['class'=>'form-control'])!!}
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('Receiver Phone', 'Receiver Phone') !!}
						{!! Form::text('receiver_phone', null, ['class'=>'form-control'])!!}
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('Destination', 'Destination') !!}
						{!! Form::text('destination', 'Nigeria', ['class'=>'form-control','readonly'=>'readonly'])!!}
					</div>
					</div>
				</div>
<!--Transactions-->	
				<div class="row">
					<div class="col-md-6 col-md-offset-1">
						<h3>Transactions</h3><hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group form-group-sm">
							{!! Form::label('Amount Sending', 'Amount Sending') !!}
							{!! Form::text('amount', null, ['class'=>'form-control','readonly'=>'readonly'])!!}
						</div>
							
						<div class="form-group form-group-sm">
							{!! Form::label('Naira Equivalence', 'Naira Equivalence') !!}
							{!! Form::text('local_payment', null, ['class'=>'form-control','readonly'=>'readonly'])!!}
						</div>
						<div class="form-group form-group-sm">
							{!! Form::label('Commission', 'Commission') !!}
							{!! Form::text('commission', null, ['class'=>'form-control','readonly'=>'readonly'])!!}
						</div>
						<div class="form-group form-group-sm">
							{!! Form::label('Total Payment', 'Total Payment') !!}
							{!! Form::text('total', null, ['class'=>'form-control','readonly'=>'readonly'])!!}
						</div>
						<div class="form-group form-group-sm">
							{!! Form::label('Transfer Code', 'Transfer Code') !!}
							{!! Form::text('receipt_number', null, ['class'=>'form-control','readonly'=>'readonly'])!!}
						</div>
							
							
					</div>
					
					<div class="col-md-6">
						<div class="form-group form-group-sm">
							{!! Form::label('Todays Rate', 'Todays Rate') !!}
							{!! Form::text('exchange_rate', null, ['class'=>'form-control','readonly'=>'readonly'])!!}
						</div>
							
						<div class="form-group form-group-sm">
							{!! Form::label('Transfer Mode', 'Transfer Mode') !!}
							{!! Form::select('transfer_type',['Pick up'=>'Pick up','Bank Account'=>'Bank Account'] ,$transaction->transfer_type, ['class'=>'form-control'])!!}
						</div>
							
						<div class="form-group form-group-sm">
							{!! Form::label('Bank', 'Bank') !!}
							{!! Form::select('transfer_type',$bank,$transaction->bank, ['class'=>'form-control'])!!}
						</div>
						<div class="form-group form-group-sm">
							{!! Form::label('Mode of Identity', 'Mode Of Identity') !!}
							{!! Form::text('identity', null, ['class'=>'form-control','readonly'=>'readonly'])!!}
						</div>
						<div class="form-group form-group-sm">
							{!! Form::label('Account Number', 'Account Number') !!}
							{!! Form::text('account_number', null, ['class'=>'form-control'])!!}
						</div>
							<input type="submit" class="btn btn-primary" name="submit" value="Submit">
							</div>
							
						</div>
					</div>
				</div>
			</d

@stop