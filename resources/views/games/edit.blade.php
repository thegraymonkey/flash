@extends('app')

@section('content')

<div class="row">
		<div class="col-md-10 col-md-offset-1">
			
			<form class="well" method="POST" action="{{ route('games.update', [$game->id]) }}" enctype="multipart/form-data">
				<input type="hidden" name="game_id" value="{{ $game->id }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">	
				<input type="hidden" name="_method" value="PUT">

				<label>Update Game</label>

				<div class="form-group">
					
					<label>Title</label>
					<textarea  class="form-control" name="title">{{ $game->title }}</textarea>
				</div>

				<div class="form-group">	
					<label for="photo">Game Thumbnail</label>
					<input class="form-control" type="file" name="photo" id="photo">
				</div>

				<div class="form-group">
					<label>Description</label>
					<textarea  class="form-control" name="description">{{ $game->description}}</textarea>
				</div>

				<div class="form-group">
					<label>Game Code</label>
					<textarea  class="form-control" name="code">{{ $game->code }}</textarea>
				</div>

				<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Update and Publish"/>
				</div>

			</form>
				
		</div>
	</div>

@stop
