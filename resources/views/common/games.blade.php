<div class="row">

@foreach($games as $game)

	<div class="col-md-4">
		<div class="panel panel-info">
		  <div class="panel-heading">
		    <h3 class="panel-title">{{ $game->title}}</h3>
		  </div>
		  <div class="panel-body">
		    <a href="{{ route('games.show', [$game->id]) }}">
		    	@if($game->thumbnail)
		    	<img src="{{ $game->thumbnail }}" class="img-rounded img-responsive" alt="Responsive image" width="230px" height="260px">
		    	@else
		    	<img src="{{ $game->getImagePath() }}" class="img-rounded img-responsive" alt="Responsive image">
		   		@endif
		    </a>
		    
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

		  </div>
		</div>
	</div>

@endforeach

</div>