@extends('app')

@section('content')
<div class="container">
	
	@include('common.messages')
<!--FORMS FOR ADDING GAMES AND PROMOTIONAL MATERIAL -->
<div class="row">	
	
	<div class="col-md-6">
	@include('games.create')
	</div>
	<div class="col-md-6">
	@include('adds.create')
	</div>

</div>	
<hr>

<!-- LIST OF ITEMS ADDED TO WEBSITE -->

<h4>Games</h4>

<div class="row">

@foreach($games as $game)

	<div class="col-md-3">
		<div class="panel panel-info">
		  <div class="panel-heading">
		    <h3 class="panel-title">{{ $game->title }}</h3>
		  </div>
		  <div class="panel-body">
		    	@if($game->thumbnail)
		    	<img src="{{ $game->thumbnail }}" class="img-rounded img-responsive" alt="Responsive image" width="230px" height="260px">
		    	@else
		    	<img src="{{ $game->getImagePath() }}" class="img-rounded img-responsive" alt="Responsive image" width="230px" height="260px">
		   		@endif
		    
		    <div class="row">
		    	<div class="col-md-6 text-warning">
		    		Rating: *****
		    	</div>
		    	<div class="col-md-6 text-warning">
		    		Views: *****
		    	</div>
		    </div>

		    <div class="row">
				<div class="col-md-6">
					<form action="{{ route('games.destroy', [$game->id]) }}" method="post">
						<input type="hidden" name="_method" value="delete">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="submit" value="Delete" class="btn btn-xs btn-danger">
					</form>
				</div>
				<div class="col-md-6">
					<a class="btn btn-xs btn-warning" href="{{ route('games.edit', [$game->id]) }}">Edit</a>
				</div>	
			</div>

		  </div>
		</div>		
	</div>

@endforeach

</div>

<hr>

<h4>Top Banners</h4>

@foreach($topAdds as $add)
	<div>
	<img src="{{ $add->getImagePath() }}" class="img-responsive" alt="Responsive image">
		<div style="margin-bottom: 10px;" class="row">
			<div class="col-md-6">
				<form action="{{ route('adds.destroy', [$add->id]) }}" method="post">
					<input type="hidden" name="_method" value="delete">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" value="Delete" class="btn btn-xs btn-danger">
				</form>
			</div>
			<div class="col-md-6">
				<a class="btn btn-xs btn-warning" href="{{ route('adds.edit', [$add->id]) }}">Edit</a>
			</div>	
		</div>
	</div>
@endforeach

<hr>

<h4>Bottom Banners</h4>

@foreach( $bottomAdds as $add )
	<div>
	<img src="{{ $add->getImagePath() }}" class="img-responsive" alt="Responsive image">
		<div style="margin-bottom: 10px;" class="row">
			<div class="col-md-6">
				<form action="{{ route('adds.destroy', [$add->id]) }}" method="post">
					<input type="hidden" name="_method" value="delete">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" value="Delete" class="btn btn-xs btn-danger">
				</form>
			</div>
			<div class="col-md-6">
				<a class="btn btn-xs btn-warning" href="{{ route('adds.edit', [$add->id]) }}">Edit</a>
			</div>	
		</div>
	</div>
@endforeach

<hr>

<h4>Pic Adds</h4>

<div class="row">
	@foreach( $picAdds as $add )
	<div class="col-md-3">

		@if($add->thumbnail)
		    <img src="{{ $add->thumbnail }}" class="img-rounded img-responsive" alt="Responsive image" width="230px" height="260px">
		@else
		    <img src="{{ $add->getImagePath() }}" class="img-rounded img-responsive" alt="Responsive image" width="230px" height="260px">
		@endif
		{{ $add->description}}
		<div style="margin-bottom: 10px;" class="row">
			<div class="col-md-6">
				<form action="{{ route('adds.destroy', [$add->id]) }}" method="post">
					<input type="hidden" name="_method" value="delete">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" value="Delete" class="btn btn-xs btn-danger">
				</form>
			</div>
			<div class="col-md-6">
				<a class="btn btn-xs btn-warning" href="{{ route('adds.edit', [$add->id]) }}">Edit</a>
			</div>	
		</div>

	</div>
	@endforeach
</div>

<hr>

<h4>Link Adds</h4>

<div class="row">
	@foreach($linkAdds as $add)
 	<div class="col-md-6">
 		<p>{{ $add->title}}</p>
 	</div>
 	<div class="col-md-3">
		<form action="{{ route('adds.destroy', [$add->id]) }}" method="post">
			<input type="hidden" name="_method" value="delete">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="submit" value="Delete" class="btn btn-xs btn-danger">
		</form>
	</div>
	<div class="col-md-3">
		<a class="btn btn-xs btn-warning" href="{{ route('adds.edit', [$add->id]) }}">Edit</a>
	</div>
	@endforeach	
</div>


</div>


@endsection
