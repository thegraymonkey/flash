@extends('layout')



@section('content')

@include('common.top_adds')


<h4 class="text-primary">{{ $game->title }}</h4>


 {!! $game->code !!} 

@if($game->instructions)
<p class="text-warning well"><strong>Instructions: </strong>{{ $game->instructions }}</p>
@endif
@if($game->description)
<p class="text-primary well"><strong>Description: </strong>{{ $game->description }}</p>
@endif

<div style="margin-bottom:50px" class"row">
	<div class="col-md-3">
		<h4>Rate this game: </h4>
	</div>
	<div class="col-md-3">
		@include('ratings.create') 
	</div>

	<div class="col-md-3">
		<h4>Current Rating: </h4>
	</div>
	<div class="col-md-3">
		@if($game->rating == 1)
		<img src="../images/star.png">
		@elseif($game->rating == 2)
		<img src="../images/star.png">
		<img src="../images/star.png">
		@elseif($game->rating == 3)
		<img src="../images/star.png">
		<img src="../images/star.png">
		<img src="../images/star.png">
		@elseif($game->rating == 4)
		<img src="../images/star.png">
		<img src="../images/star.png">
		<img src="../images/star.png">
		<img src="../images/star.png">
		@elseif($game->rating == 5)
		<img src="../images/star.png">
		<img src="../images/star.png">
		<img src="../images/star.png">
		<img src="../images/star.png">
		<img src="../images/star.png">
		@else(!$game->rating)
		<h4>No Rating Yet...</h4>
		@endif
	</div>
</div>



<hr>

@include('common.messages')

@include('comments.create')


@include('comments.show')


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


@stop


