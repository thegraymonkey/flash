@extends('layout')

@section('content')

@include('common.top_adds')

<h4 class="text-success">Archives: {{ $month }}</h4>

<hr>

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
		    	<img src="../images/noimage.jpg" class="img-rounded img-responsive" alt="Responsive image" width="230px" height="260px">
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


@include('common.bottom_adds')

@stop

@section('sidebar')
<div style="margin-bottom:20px;">
@include('common.archives')
</div>
<div style="margin-bottom:20px;">
@include('common.pic_adds')
</div>
<div style="margin-bottom:20px;">
@include('common.link_adds')
</div>
<div style="margin-bottom:20px;">
@include('common.categories')
</div>


@stop
