@extends('layout')

@section('content')

@include('common.top_adds')

<h4 class="text-danger">Category: {{ $category->name }}</h4>

<hr>

<div class="row">
@if($games)
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
		    	<img src="{{ $game->getImagePath() }}" class="img-rounded img-responsive" alt="Responsive image" width="230px" height="260px">
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
		    		Views: *****
		    	</div>
		    </div>

		  </div>
		</div>
	</div>

@endforeach
@else
<h4>nesto</h4>
@endif
</div>

<div class="row">
  <div class="col-md-4 col-md-offset-4">
	{!! $games->render() !!}
  </div>
</div>

@include('common.bottom_adds')

@stop

@section('sidebar')

<div style="margin-bottom:20px;">
@include('common.pic_adds')
</div>
<div style="margin-bottom:20px;">
@include('common.link_adds')
</div>
<div style="margin-bottom:20px;">
@include('common.categories')
</div>
<div style="margin-bottom:20px;">
@include('common.archives')
</div>

@stop