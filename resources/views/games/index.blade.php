<div class="row">

@foreach($games as $game)

	<div class="col-md-3">
		<div class="panel panel-info">
		  <div class="panel-heading">
		    <h3 class="panel-title">{{ $game->title }}</h3>
		  </div>
		  <div class="panel-body">
		    <img src="/images/image.svg" class="img-rounded img-responsive" alt="Responsive image" width="230px" height="230px">
		    
		    <div class="row">
		    	<div class="col-md-6 text-warning">
		    		Rating: *****
		    	</div>
		    	<div class="col-md-6 text-warning">
		    		Views: *****
		    	</div>
		    </div>

		    <div class="row">
				<div class="col-md-6">
					<form action="#" method="post">
						<input type="hidden" name="_method" value="delete">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="submit" value="Delete" class="btn btn-xs btn-danger">
					</form>
				</div>
				<div class="col-md-6">
					<a class="btn btn-xs btn-warning" href="#">Edit</a>
				</div>	
			</div>

		  </div>
		</div>		
	</div>

@endforeach

</div>