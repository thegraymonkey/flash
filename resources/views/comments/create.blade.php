<div class="row well">
	 <div class="col-md-9">

<form method="POST" action="{{ route('comments.store') }}">
	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">	
	<input name="game_id" type="hidden" value="{{ $game->id }}"/>

	<div class="form-group">
		<label>Wanna leave a comment?</label>
		<input class="form-control" name="name" placeholder="name">
		<textarea  class="form-control" name="content" placeholder="content"></textarea>
	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Leave comment"/>
	</div>

</form>

	</div>
	<div class="col-md-3">
		<p style="margin-top:25px" class="text-danger">Please be respectful and don't insult anyone or your comment will be removed. Thank you.</p>
	</div>

</div>