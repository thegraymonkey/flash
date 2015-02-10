<form class="well" method="POST" action="{{ route('categories.store') }}">
	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">	
	

	<div class="form-group">
		<label>Create New Category</label>
		<input class="form-control" name="name" placeholder="name">
	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Create"/>
	</div>

</form>