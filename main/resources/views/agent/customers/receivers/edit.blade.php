@extends('layouts.layout')
@section('content')

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 style="display:inline-block;text-transform:uppercase;"></h4>
				</div>
			<div class="panel-body">
				<div class="panel-resize">
			  <div class="row">
				<div class="col-md-7 col-md-offset-3">
						<ol class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li><a href="sendersReceivers.php">Sender</a></li>
						<li class="active">Create New Receiver</li>
						
						</ol>
					</div>
					
				</div>
				
						
				{!! Form::model($receiver, ['method'=>'PATCH', 'action'=> ['AgentCustomerReceiversController@update',$receiver->id], 'files'=>true]) !!}
				<div class="row">
							<div class="col-md-5 ">
								<div class="form-group form-group-sm">
									<span class="text-danger">*</span>
									{!! Form::label('fname', 'First Name')!!}
									{!! Form::text('fname', null, ['class'=>'form-control'])!!}
								</div>
							</div>
							
							<div class="col-md-5 ">
								<div class="form-group form-group-sm">
									<span class="text-danger">*</span>
									 {!! Form::label('lname', 'Last Name')!!}
									{!! Form::text('lname', null, ['class'=>'form-control'])!!}
								</div>
							</div>
				</div>		
				<div class="row">	
							<div class="col-md-5">
								<div class="form-group form-group-sm">
									{!! Form::label('transfer_type', 'Transfer Type:') !!}
							         {!! Form::select('transfer_type', ['Pick Up'=>'Pick Up','Pick'=>'Bank Account'] , null, ['class'=>'form-control'])!!}
								</div>
							</div>

							<div class="col-md-5">
								<div class="form-group form-group-sm">
									{!! Form::label('phone', 'Phone')!!}
									{!! Form::text('phone', null, ['class'=>'form-control'])!!}
								</div>
							</div>
				</div>
						
							
			<div class="row">
					<div class="col-md-5 col-md-offset-3">
						<div class="form-group form-group-sm">
								{!! Form::label('bank', 'Bank') !!}
							    {!! Form::select('bank', [$bank] , null, ['class'=>'form-control'])!!}
									
								</div>
							</div>

						</div>
						
			<div class="row"  id="actno">
						<div class="col-md-5 col-md-offset-3" >
							<div class="form-group form-group-sm">
									{!! Form::label('account_number', 'Account Number')!!}
									{!! Form::text('account_number', null, ['class'=>'form-control'])!!}
								</div>
							</div>
			</div>
			<div class="row" id="modeId" >	
				<div class="col-md-5 col-md-offset-3">
						<div class="form-group form-group-sm">
							{!! Form::label('Identity', 'Identity') !!}
							 {!! Form::select('identity_type', ['National ID'=>'National ID','Intl Passport'=>'Intl Passport','Drivers Lincence'=>'Drivers Lincence','Any type of ID' => 'Any type of ID'] , null, ['class'=>'form-control'])!!}	
								</div>
							</div>
			</div>
						
			<div class="row">
				<div class="col-md-5 col-md-offset-4">
					<div class="form-group form-group-sm">
						<br/><br/>
						{!! Form::submit('Submit', ['class'=>'btn btn-primary btn-block'])!!}
								</div>
							</div>
			</div>
				{!! Form::close() !!}

				</div>
			</div>
		</div>

@endsection