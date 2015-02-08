		<div class="col-md-6 ">
				
			<form class="well" method="POST" action="#" enctype="multipart/form-data">
			
				<input type="hidden" name="_token" value="{{ csrf_token() }}">	

				<label>New Link Add</label>

				<div class="form-group">
					<label>Title</label>
					<textarea  class="form-control" name="title"></textarea>
				</div>

				<div class="form-group">
					<label>Description</label>
					<textarea  class="form-control" name="description"></textarea>
				</div>

				<div class="form-group">
					<label>Link</label>
					<textarea  class="form-control" name="link"></textarea>
				</div>

				<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Publish"/>
				</div>

			</form>
					
		</div>