@extends('layout')

@section('content')

<div style="margin-bottom: 10px;"><img src="images/banner.jpg"></div>



<h4 class="text-primary">Todays Free Games</h4>

<hr>

<div class="row">

@foreach($games as $game)

	<div class="col-md-4">
		<div class="panel panel-info">
		  <div class="panel-heading">
		    <h3 class="panel-title">{{ $game->title}}</h3>
		  </div>
		  <div class="panel-body">
		    <a href="{{ route('games.show', [$game->id]) }}"><img src="{{ $game->getImagePath() }}" class="img-rounded img-responsive" alt="Responsive image" width="230px" height="260px"></a>
		    
		    <div class="row">
		    	<div class="col-md-6 text-warning">
		    		Rating: *****
		    	</div>
		    	<div class="col-md-6 text-warning">
		    		Views: *****
		    	</div>
		    </div>

		  </div>
		</div>
	</div>

@endforeach

</div>

<div class="row">
  <div class="col-md-4 col-md-offset-4">
	{!! $games->render() !!}
  </div>
</div>

<div style="margin-bottom: 10px;"><img src="images/banner.jpg"></div>

<div style="margin-bottom: 10px;"><img src="images/banner.jpg"></div>

@stop

@section('sidebar')

<div style="margin-bottom:20px;">
@include('common.sponsored')
</div>
<div style="margin-bottom:20px;">
@include('common.links')
</div>
<div style="margin-bottom:20px;">
@include('common.categories')
</div>
<div style="margin-bottom:20px;">
@include('common.archives')
</div>

@stop