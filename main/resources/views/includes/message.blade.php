@if(Session::has('message'))


	<div class="row">
		    <div class=" col-md-4 col-md-offset-5  text-center error">
		        <ul>
		                <li class="alert alert-success">{{Session::get('message')}}</li>

		        </ul>

		    </div>

	</div>


@endif

