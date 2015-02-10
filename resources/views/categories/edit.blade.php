@extends('app')

@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">

	<form class="well" method="POST" action="{{ route('categories.update', [$category->id]) }}">
		
		<input type="hidden" name="_token" value="{{ csrf_token() }}">	
		<input type="hidden" name="category_id" value="{{ $category->id }}">
		<input type="hidden" name="_method" value="PUT">

		<div class="form-group">
			<label>Update Category</label>
			<input class="form-control" name="name" placeholder="name" value="{{ $category->name }}">
		</div>
		<div class="form-group">
			<input class="btn btn-primary" type="submit" value="Update"/>
		</div>

	</form>

	</div>
</div>

@stop