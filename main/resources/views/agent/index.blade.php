
@extends('layouts.layout')
@section('content')
    
   	 <div class="col-md-12">
		  <section id="notice"><div class="well well-lg">
		  <i class="glyphicon glyphicon-dashboard"></i> 
		  <span class="label label-info pull-left">Last Login:12-03-2016 08:12</span>
		  <span class="label label-info pull-right">Bank Details</span>
		  </section>
          <!-----How It Works---->
		  <div id="howitwork">
			  <div class="well well-lg">
					<h2> How It Work</h2>
				 <div class="flow">
				@if(Auth::user()->isAgent())
					<a href="newSender.php" >
					  <span> Create New Sender</span>
					 </a>
					 @endif
					  <span><a href="sendersReceivers.php" > Create Receiver</a></span>
					  <span> <a href="sendMoney.php" >Send Money</a></span>
				</div>
				  <div class="diagram">
					@if(Auth::user()->isAgent())
						<a href="newSender.php" >
							<span class="fa-stack fa-4x">		  
							  <i class="fa fa-square-o fa-stack-2x"></i>
							  <i class="fa fa-user fa-stack-1x"></i>
							</span>
						</a>
					@endif
						
						
						<span><i class="fa fa-long-arrow-right fa-4x" aria-hidden="true"></i></span>
					
					
						<a href="sendersReceivers.php" >
							<span class="fa-stack fa-4x">		  
							  <i class="fa fa-square-o fa-stack-2x"></i>
							  <i class="fa fa-users fa-stack-1x"></i>
							</span>
						</a>
					
						
						<span><i class="fa fa-long-arrow-right fa-4x" aria-hidden="true"></i></span>
						
						<a href="sendMoney.php" >
							<span class="fa-stack fa-4x">		  
							  <i class="fa fa-square-o fa-stack-2x"></i>
							  <i class="fa fa-money fa-stack-1x"></i>
							</span>
						</a>
					</div>
			</div>
		  </div>
		   
		   
		   
            <h3>Latest Transactions</h3>
            <table class="table table-striped">
			<thead>
			<tr row="row">
			<th>No</th>
			<th>Tcode</th>
			<th>Sender</th>
			<th>Receiver</th>
			<th>Local Pay</th>
			<th>C_B</th>
			<th>C-ag</th>
			<th>Total</th>
			<th>Status</th>
			</tr>
			<thead>
             <?php $x=0; foreach($trans_result as $result): ?>
				 
				 
			
			   <tr>
                <td><?php  echo $x=$x+1;?></td>
				<td><?php  echo ucfirst($result->receipt_number);?></td>
				<td><?php  echo ucfirst($result->sender_name);?></td>
				<td><?php  echo ucfirst($result->receiver_name);?></td>
				<td><?php  echo ($result->amount * $result->commission);?></td>
				<td><?php  echo ($result->commission - $result->agent_commission);?></td>
				<td><?php  echo $result->agent_commission;?></td>
				<td><?php  echo ($result->amount + $result->commission);?></td>
				<td><?php  echo $result->status;?></td>
                
              </tr>
			  <?php endforeach; ?>
             
             
            </table>
            <a class="btn btn-default" href="prevTrans.php">View All Pages</a>
            <hr>

          
            	@if(Auth::user()->isAgent())
            		  <h3>Latest Customers</h3>
			
				@else 
				 <h3>Latest Receiver</h3>
				
				@endif
            <table class="table table-striped">
				<tr>
	                <th>No</th>
	                <th>Name</th>
					 <th>Mobile</th>
					  <th>Member</th>
	             </tr>
				  	@if(Auth::user()->isAgent())
					<?php $x=0; foreach($customers as $customer): ?>
	              
	              <tr>
	                <td><?php echo $x=$x+1; ?></td>
	                <td><?php echo ucfirst($customer->fname). "-" . ucfirst($customer->lname); ?></td>
	               	<td><?php echo $customer->mobile; ?></td>
	               	<td><?php echo $customer->user->name; ?></td>
	              </tr>
	              <?php endforeach; ?>
	              @endif
				  
				  
				  @if(Auth::user()->isCustomer())
				<?php $x=0; foreach($customers as $customer): ?>
	              <tr>
	                <td><?php echo $x=$x+1; ?></td>
	                <td><?php echo ucfirst($customer->b_fname). "-" . ucfirst($customer->b_lname); ?></td>
	               <td><?php echo $customer->phone; ?></td>
	              </tr>
	              <?php endforeach; ?>
	              @endif
            </table>
            <a class="btn btn-default" href="sendersReceivers.php">View All</a>
          </div>
        </div>
      </div>

    </section>

@endsection