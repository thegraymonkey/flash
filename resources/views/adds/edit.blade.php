@extends('app')

@section('content')	

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			
			<form class="well" method="POST" action="{{ route('adds.update', [$add->id]) }}" enctype="multipart/form-data">
		
				<input type="hidden" name="add_id" value="{{ $add->id }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">	
				<input type="hidden" name="_method" value="PUT">

				<label>Update Promo Material</label>

				<div class="form-group">
					<label>Title</label>
					<textarea  class="form-control" name="title">{{ $add->title }}</textarea>
				</div>

				<div class="form-group">
					<label>Link</label>
					<textarea  class="form-control" name="link">{{ $add->link }}</textarea>
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
					<textarea  class="form-control" name="thumbnail">{{ $add->thumbnail }}</textarea>
				</div>

				<div class="form-group">
					<label>Description</label>
					<textarea  class="form-control" name="description">{{ $add->description }}</textarea>
				</div>

				<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Publish"/>
				</div>

			</form>
				
		</div>
	</div>
	
@stop