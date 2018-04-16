@extends('layouts.layout')
@section('content')
<div class="row">										
				<div class="col-md-8">		
					   <ol class="breadcrumb">
							<div class="row">	
								<div class="col-md-12">
									  <li><a href="index.php">Home</a></li>
									  <li class="active"><a href="sendersReceivers.php">Senders</a></li>
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
						<th>Sender <i class="caret"></i></th>
						
						<th>Mobile <i class="caret"></i></th>
						<th>Activity </th>
						<th>Set-Up Receiver</th>
						<th>Modify</th>			
						<th>View</th>		
						<th>Send</th>
						</tr>
						<thead>
						<tbody>
						 <?php $x=0; foreach($trans_result as $result): ?>
						<tr>
							<td><?php  echo $x=$x+1;?></td>
							<td><a href="{{route('customer.edit',$result->id)}}">
								<?php  echo ucfirst($result->title)." ".ucfirst($result->fname)." ". ucfirst($result->lname);?></a></a></td>
							
							<td><?php  echo $result->mobile;?></td>
							<td><a href="#"" class="btn btn-warning"><i class="fa fa-money fa-lg"> 22</a></td>

							<td><a href="customer/{{$result->id}}/create" class="btn btn-default btn-lg"><i class="fa fa-users fa-lg"> New Receiver</a></td>	
						 	
						 	<td><a href="{{route('customer.edit',$result->id)}}" class="btn btn-primary"><i class="fa fa-users fa-lg"> Modify</a></td>	
							
							<td> <a href="customer/{{$result->id}}/receivers/list" class="btn btn-success"><i class="fa fa-user fa-sm">View</a></td>
							
							<td><a href="#"  class="btn btn-danger"><i class="fa fa-money fa-lg">  Send Money</a></td>
						 </tr>
						  <?php endforeach; ?>
						  </tbody>
						</table>
@endsection