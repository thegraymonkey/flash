		
			
			<form class="well" method="POST" action="{{ route('adds.store') }}" enctype="multipart/form-data">
		
				<input type="hidden" name="_token" value="{{ csrf_token() }}">	

				<label>New Promo Material</label>

				<div class="form-group">
					<label>Title</label>
					<textarea  class="form-control" name="title"></textarea>
				</div>

				<div class="form-group">
					<label>Link</label>
					<textarea  class="form-control" name="link"></textarea>
				</div>

				<div class="form-group">
					<label for="position">Position</label>
			          <select class="form-control" name="position">
						<option value="top">Top</option>
						<option value="bottom">Bottom</option>
						<option value="picture">Picture</option>
						<option value="link">Link</option>
					  </select>
			    </div> 

				<div class="form-group">	
					<label for="photo">Add Image</label>
					<input class="form-control" type="file" name="photo" id="photo">
				</div>

				<div class="form-group">
					<label>Thumbnail</label>
					<textarea  class="form-control" name="thumbnail"></textarea>
				</div>

				<div class="form-group">
					<label>Description</label>
					<textarea  class="form-control" name="description"></textarea>
				</div>

				<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Publish"/>
				</div>

			</form>
				
		