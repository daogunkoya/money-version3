@extends('layouts.layout')
@section('content')
	 <div class="row">
					<div class="col-md-4">
						<ol class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li class="active"> Previous Transaction</li>
						</ol>
					</div>
					
					<div class="col-md-5">
						
					</div>
					
	</div>
	<div class="row">
		<div class="col-md-12">
			 <table id="sort-table" class="table table-striped table-bordered tablesorter">
				<thead>
							<tr>
								<th>No </th>
								<th>Date <i class=""></i></th>
								<th>Tcode  </th>
								<th>Sender <i class=""></i></th>
								<th>Receiver </th>
								<th>Amt</th>
								<th>Local Pay</th>
								<th>C_B</th>
								<th>C-ag</th>
								<th>Total</th>
								<th>Status</th>
								<th>--</th>
								<th>--</th>
								<th>--</th>
							</tr>
					</thead>
					<tbody>
						<?php $x=0;$tamt_send=0;$totalAmount=0;$totalLocalAmount=0;$totalAgentCommission=0;$totalBusinessCommission=0; $tTotal=0; ?>
								 @foreach($transactions as $transaction)
							<tr>
							<td>{{$x=$x+1}}</td>
							<td>{{ $transaction->created_at->diffForhumans()}}</td>
							<td>{{ucfirst($transaction->receipt_number)}}</td>
							<td>{{ $transaction->sender_name}}</td>
							<td>{{ $transaction->receiver_name}}</td>
							<td>{{ number_format($transaction->amount, 2)}}</td>
							<td>{{$transaction->local_payment}}</td>
							<td>{{$transaction->business_commission}}</td>
							<td>{{$transaction->agent_commission}}</td>
							<td>{{$transaction->total}}</td>
							<td>{{$transaction->status}}</td>
<!---Sum Here-->
							<?php
							$totalAmount += $transaction->amount;
							$totalLocalAmount += ($transaction->amount * $transaction->exchange_rate);
							$totalAgentCommission += ($transaction->commission * ($transaction->agent_commission/100));
							$totalBusinessCommission += ($transaction->commission * (100-$transaction->agent_commssion)/100);
							$tTotal +=($transaction->amount + $transaction->commission);		
							?>
									
									
							<td> <a href="{{route('customer-transactions.edit',$transaction->id)}}" class="btn btn-warning">Edit</a></td>

							{!! Form::open(['method'=>'DELETE', 'action'=>[ 'AgentTransactionsController@destroy',$transaction->id], 'files'=>true]) !!}
								<td>{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}</td>
							{!! Form::close() !!}
								
							<td><a href="" class="btn btn-info"><i class="fa fa-print" aria-hidden="true"></i>Receipt</a></td>		
									
								 </tr>
							 @endforeach

							 <tr>
								<td colspan="5"><strong>Total</td>
								<td><strong>&pound;{{number_format(($user->agentTransactions()->sum('amount')),2)}}</strong></td>
								<td><strong>&#8358;{{number_format($totalLocalAmount,2)}}</strong></td>
								<td><strong>&pound;{{ number_format($totalAgentCommission,2)}}</strong></td>
								<td><strong>&pound;{{ number_format($totalBusinessCommission,2)}}</strong></td>
								<td><strong>&pound;{{ number_format($tTotal,2) }}</strong></td>
								</strong>
							</tr>
						</tbody>
			</table>
				<div class="row">
					<div class="col-md-5 col-md-offset-3 text-center">
						{{$transactions->render()}}
					</div>
				</div>
		</div>
	</div>
@endsection