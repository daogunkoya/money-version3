@extends('layouts.layout')
@section('content')

					<div class="row">
						<div class="col-md-4">
							<small class="essential">Areas Marked with * are important</small>
						</div>
						<div class="col-md-4">	
							<ol class="breadcrumb">
							  <li><a href="index.php">Home</a></li>
							  <li><a href="senders.php">Senders</a></li>
							  <li class="active">New Senders</li>
							</ol>
						</div>
					</div><h3>Register New Sender</h3>
<!-- Form -->
		{!! Form::open(['method'=>'POST', 'action'=> 'AgentCustomerController@store', 'files'=>true]) !!}
					 <div class="panel panel-default">
						<div class="panel-heading">
							
						</div>
					<div class="panel-body">
						<div class="row">
								<div class="col-md-3 col-md-offset-1">
										<div class="form-group form-group-sm">
											{!! Form::label('title', 'Title:') !!}
							                {!! Form::select('title', ['mr'=>'Mr','miss'=>'Miss','mrs'=>'Mrs'] , null, ['class'=>'form-control'])!!}
										</div>
								</div>														
						</div>
						
							<div class="row">																					
								<div class="col-md-5 col-md-offset-1 ">
									<div class="form-group form-group-sm">
										<span class="essential">*</span>
										{!! Form::label('fname', 'First Name')!!}
										{!! Form::text('fname', null, ['class'=>'form-control'])!!}
													
									</div>
								</div>
										
								<div class="col-md-5">
										<div class="form-group">
										<span class="essential">*</span>
										{!! Form::label('mname', 'Middle Name')!!}
										{!! Form::text('mname', null, ['class'=>'form-control'])!!}
													
									</div>
								</div>
							</div>
							
							<div class="row">																				
								<div class="col-md-5 col-md-offset-1">
										<div class="form-group form-group-sm">
											<span class="essential">*</span>
											{!! Form::label('lname', 'Last Name')!!}
											{!! Form::text('lname', null, ['class'=>'form-control'])!!}
														
										</div>
								</div>
										
										<div class="col-md-5">
												{!! Form::label('dob', 'Date Of Birth')!!}
												<div class="form-group input-group form-group-sm">
													 <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
													{!! Form::date('dob', '09/04/2015', ['class'=>'form-control'])!!}
												</div>
										</div>
							</div>
							<div class="row">
							
									<div class="title_header">Contact Information</div>
									
							</div>
							<div class="row">	
								<div class="col-md-5 col-md-offset-1">
									<div class="form-group form-group-sm">
										<span class="essential">*</span>
										{!! Form::label('phone', 'Phone Number')!!}
										{!! Form::text('phone', null, ['class'=>'form-control'])!!}
														
									</div>
								</div>
										
								<div class="col-md-5">
									<div class="form-group form-group-sm">
										<span class="essential">*</span>
										{!! Form::label('mobile', 'Mobile Number')!!}
										{!! Form::text('mobile', null, ['class'=>'form-control'])!!}
														
									</div>
								</div>
							</div>
							
							<div class="row">													
								<div class="col-md-5 col-md-offset-1">
									<div class="form-group form-group-sm">
										<span class="essential">*</span>
										{!! Form::label('email', 'Email')!!}
										{!! Form::text('email', null, ['class'=>'form-control'])!!}
														
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group form-group-sm">
										<span class="essential">*</span>
										{!! Form::label('cemail', 'Confirm Email')!!}
										{!! Form::text('cemail', null, ['class'=>'form-control'])!!}
									</div>
								</div>
							</div>
							
							<div class="row">
											<div class="title_header">Residence</div>
										<div class="col-md-7 col-md-offset-2">
											{!! Form::label('Address Postocode', 'Address / Postcode')!!}<span class="essential">*</span>
										</div>
										<div class="col-md-7 col-md-offset-2">
												<div class="form-group form-group-sm">
													<input name = "search" type=text required name=postcode id="autocomplete" class="form-control"  onFocus="geolocate()">
												</div>
												
   										 </div>
							</div>
											
								
							<br/><br/>
							<div class="row">
								<div class="col-md-2 col-md-offset-2">
									<div class="form-group form-group-sm">
										{!! Form::label('No', 'Number')!!}
										{!! Form::text('number', null, ['class'=>'form-control','id'=>'street_number', 'required'=>'required'])!!}
									</div>		
								</div>
								<div class="col-md-7">
									<div class="form-group form-group-sm">
										{!! Form::label('Address', 'Address')!!}
										{!! Form::text('address', null, ['class'=>'form-control','id'=>'route','readonly'=>'readonly'])!!}
									</div>		
								</div>
										
										
							</div>
							<div class="row">
										<div class="col-md-5 col-md-offset-1 ">
											<div class="form-group form-group-sm">
												{!! Form::label('postcode', 'Post Code')!!}
												{!! Form::text('postcode', null, ['class'=>'form-control','id'=>'postal_code','readonly'=>'readonly'])!!}
											</div>
										</div>
										
										<div class="col-md-5">
												<div class="form-group form-group-sm">
												{!! Form::label('town', 'Town')!!}
												{!! Form::text('town', null, ['class'=>'form-control','id'=>'locality','readonly'=>'readonly'])!!}
											</div>
										</div>
							</div>																		
							
							<div class="row">
										<div class="col-md-5 col-md-offset-1">
												<div class="form-group form-group-sm">
												{!! Form::label('county', 'County')!!}
												{!! Form::text('county', null, ['class'=>'form-control','id'=>'administrative_area_level_1','readonly'=>'readonly'])!!}
											</div>
										</div>
										
											<div class="col-md-5">
												<div class="form-group form-group-sm">
												{!! Form::label('country', 'Country')!!}
												{!! Form::text('country', null, ['class'=>'form-control','id'=>'country','readonly'=>'readonly'])!!}
											</div>
											</div>
							</div>
							
										<div class="row">
											<div class="col-md-5 col-md-offset-1">
												<div class="title_header"><span class="essential">*</span>Terms And Conditions</div>
											</div>
										</div>
										<div class="row">	
												<div class="col-md-12">
														<p><strong>Clicking the submit button you have read and accepted the <a href="terms.php">TERMS AND CONDITIONS</a> and Your information will be held securely 
														with our data protection and management policy?</strong><p>
												</div>																																
										
										</div>
									
										<div class="row">
												<div class="col-md-5 col-md-offset-3 ">
													{!! Form::submit('Submit', ['class'=>'btn btn-primary btn-block'])!!}					
												</div>			
										</div>	
					</div>
			{!! Form::close() !!}

@endsection