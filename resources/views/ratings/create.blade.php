<form class="form-inline" method="POST" action="{{ route('adds.store') }}" enctype="multipart/form-data">
		
	<input type="hidden" name="_token" value="{{ csrf_token() }}">	

	<div class="form-group">
		<select class="form-control" name="rating">
			<option value="1">1 Star</option>
			<option value="2">2 Star</option>
			<option value="3">3 Star</option>
			<option value="4">4 Star</option>
			<option value="5">5 Star</option>
		</select>
	</div> 
	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Rate"/>
	</div>

</form>