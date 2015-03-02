
		
			
			<form class="well" method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">
		
				<input type="hidden" name="_token" value="{{ csrf_token() }}">	
				
				
				<label>New Game</label>

				<div class="form-group">
					
					<label>Title</label>
					<textarea  class="form-control" name="title"></textarea>
				</div>

				<div class="form-group">	
					<label for="photo">Game Image</label>
					<input class="form-control" type="file" name="photo" id="photo">
				</div>

				<div class="form-group">
					<label>Description</label>
					<textarea  class="form-control" name="description"></textarea>
				</div>

				<div class="form-group">
					<label>Game Code</label>
					<p class="text-primary">If we are hosting the game adjust this code but 						
						if we are embading game from other source just paste the code provided<p>
					<textarea  class="form-control" name="code">
<object width="800" height="512">
    <param name="movie" value="/swf/FOLDERNAME/online-game.swf">
    <embed src="/swf/FOLDERNAME/online-game.swf" width="800" height="512">
    </embed>
</object> 
					</textarea>
				</div>

				<div class="form-group">
					<label>Game Thumbnail</label>
					<textarea  class="form-control" name="thumbnail"></textarea>
				</div>

				<div class="form-group">
					<label>Game Instructions</label>
					<textarea  class="form-control" name="instructions"></textarea>
				</div>

				<div class="form-group">
					<label>Game Category</label>				
					<select class="form-control" name="category_id">
						@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div> 

				<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Publish"/>
				</div>

			</form>
				
		