

<h4 class="text-danger">Categories</h4>

<hr>

<div class="row">
@foreach($categories as $category)
	<div class="col-md-6">
		<a href="{{ route('categories.show', [$category->id]) }}"><p>{{ $category->name }}</p></a>
	</div>
@endforeach
</div>


