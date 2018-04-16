@extends('layouts.agentlayout')
@section('content')
<div class="row">										
				<div class="col-md-8">		
					   <ol class="breadcrumb">
							<div class="row">	
								<div class="col-md-12">
									  <li><a href="index.php">Home</a></li>
									  <?php if( $userType['type']=='agent') : ?>
									  <li class="active"><a href="sendersReceivers.php">Receivers</a></li>
									  <?php endif; ?>
								</div>
							</div>
<!---search customer-->	<div class="row">
								<div class="col-md-12">
									<form name="form1" action="" method="post">
										<div class="form-group">
											<div class="ui-widget">
												<input type="text" class="form-control" id="getMember" placeholder="Search...">
											</div>
										</div>
									</form>
								</div>
							</div>
						</ol>
					</div>
					
					<div class="col-md-4">
						<span style="float:right;"><?php //echo $pages; ?>
								 <?php //echo $items; ?></span>
								
								<nav style="float:right;">
								 <ul class="pagination">
								<?php //echo $pagin;?>
								</ul>
								</nav>
					</div>
					
			</div>
						
					   <table id="sort-table" class="table table-striped tablesorter">
						  <thead>
						  <tr>
						<th>No </th>
						<th>Name <i class="caret"></i></th>
						
						<th>Mobile <i class="caret"></i></th>
						<th>Modify</th>	
						<th>Delete</th>					
						<th>Send</th>
						</tr>
						<thead>
						<tbody>
						
						 <?php $x=0; foreach($receivers as $receiver): ?>
						<tr>
							<td><?php  echo $x=$x+1;?></td>
							<td><a href="{{route('customer.edit',$receiver->id)}}">
								<?php  echo ucfirst($receiver->title)." ".ucfirst($receiver->fname)." ". ucfirst($receiver->lname);?></a></a></td>
							
							<td><?php  echo $receiver->phone;?></td>
								
						 	
						 	<td><a href="{{route('receiver.edit',$receiver->id)}}" class="btn btn-primary"><i class="fa fa-users fa-lg"> Modify</a></td>	

						 	{!! Form::open(['method'=>'DELETE', 'action'=>[ 'ReceiversController@destroy', $receiver->id ], 'files'=>true]) !!}	
						 	<td>{!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block'])!!}</td>
						 	{!! Form::close() !!}
							
							<td><a href="#"  class="btn btn-success btn-lg"><i class="fa fa-money fa-lg">  Send Money</a></td>
						 </tr>
						  <?php endforeach; ?>
						  
						  </tbody>
						</table>
@endsection