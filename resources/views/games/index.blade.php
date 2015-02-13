<div class="row">

@foreach($games as $game)

	<div class="col-md-4">
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
			    		@if($game->rating)
			    		Rating: {{ $game->rating}}
			    		@else
			    		Rating: X
			    		@endif
		    		</div>
		    		<div class="col-md-6 text-warning">
		    		@if($game->views)
		    		Views: {{ $game->views}}
		    		@else
		    		Views: X
		    		@endif
		    		</div>
		    	</div>

		    <div class="row">
				<div class="col-md-6">
					<form action="#" method="post">
						<input type="hidden" name="_method" value="delete">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="submit" value="Delete" class="btn btn-xs btn-danger">
					</form>
				</div>
				<div class="col-md-6">
					<a class="btn btn-xs btn-warning" href="#">Edit</a>
				</div>	
			</div>

		  </div>
		</div>		
	</div>

@endforeach

</div>