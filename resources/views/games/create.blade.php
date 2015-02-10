
		
			
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
					<textarea  class="form-control" name="code"></textarea>
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
				
		