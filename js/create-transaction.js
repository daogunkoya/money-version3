$(function(){

	//sender ajax request
			$('#senders').on('change', function (e) {
				    var optionSelected = $("option:selected", this); //not much relevance
				    var valueSelected = this.value;
				    $('#receivers').find('option').not(':nth-child(1), :nth-child(2)').remove();
		<!-- ajax call-->
				    $.ajax({
				    type:'GET',
				    url:valueSelected +'/receivers',
				    data:valueSelected,
				    error:function(request, status, error){
				    	console.log(error)
					},
					success:function(response){
						console.log(response)
						$.each(response,function(index){
						    $('#receivers')
						    .append($("<option></option>")
			                    .attr("value",response[index].id)
			                    .text(response[index].fname + " "+ response[index].lname)); 
						});
					},

					})
			})

//Receiver ajax request
			$('#receivers').on('change', function (e) {
				    var optionSelected = $("option:selected", this); //not much relevance
				    var receiverSelected = this.value;
		<!-- ajax call-->
				if(receiverSelected == 2){
						 	$('#receiver_fname').val("").removeAttr("readonly");
						 	$('#receiver_lname').val("").removeAttr("readonly");
						  	$('#receiver_phone').val("").removeAttr("readonly")
							$('#receiver_bank').val("").removeAttr("readonly")
							$('#Transfer_option').replaceWith("<select name = 'transfer_option'  id = 'Transfer_option' class='form-control'><option>Pick Up</option><option>Bank Account</option></select>")
							$('#receiver_accountno').val("").removeAttr("readonly")
				}
					else{
						$.ajax({
						    type:'GET',
						    url:receiverSelected +'/receiver',
						    data:receiverSelected,
						    error:function(request, status, error){
						    	console.log(error)
							},
							success:function(response){
								console.log(response)
								$('#receiver_fname').val(response.fname).attr('readonly', true)
								$('#receiver_lname').val(response.lname).attr('readonly', true)
								$('#receiver_phone').val(response.phone).attr('readonly', true)
								$('#receiver_bank').val(response.bank).attr('readonly', true)
								$('#Transfer_option').val(response.transfer_type).attr('readonly', true)
								$('#receiver_accountno').val(response.account_number).attr('readonly', true)
		//fill text-boxes
								},
							})

					}
						    

			})

//Transactions


			$('#amount').on('keyup', function() {
					amount  = parseFloat($('#amount').val())
					option = $('input[type=radio][id=pounds]').val() =='pounds'?'pounds':'naira'
					  
					rate  = parseFloat($('#exchange_rate').val())
					console.log(`amount = ${amount}, rate = ${rate}`)
					console.log(option)

					amount = option == 'pounds'?amount:(amount * rate)
						
						$.ajax({
							 type:'GET',
								    url:$('#amount').val() +'/findratecommission',
								    data:amount,
								    error:function(request, status, error){
								    	console.log(error)
									},
									success:function(response){
										rate = response.rate
										commission = response.commission
										if(option == 'naira'){
											$('#commission').val(commission)
											$('#total').val(parseFloat(commission) + parseFloat(amount) )
											$('#local_payment').val(parseFloat(rate) * parseFloat(amount) )
										}else{

											$('#commission').val('0')
											$('#total').val('0')
											$('#local_payment').val('0')
											}
											
									},

						})
       
   			 });
    
	});

