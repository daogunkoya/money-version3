@if(count($errors) > 0 )

	<div class="row">
		    <div class=" col-md-4 col-md-offset-5  text-center error">

		        <ul>

		            @foreach($errors->all() as $error)


		                <li class="alert alert-danger">{{$error}}</li>


		            @endforeach



		        </ul>



		    </div>

	</div>


@endif
