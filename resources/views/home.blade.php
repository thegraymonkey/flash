@extends('app')

@section('content')
<div class="container">
	
	@include('common.messages')
	<!--FORMS FOR ADDING GAMES AND PROMOTIONAL MATERIAL -->

	@include('games.create')

	<div class="row">
	
	@include('top_banners.create')
	@include('bottom_banners.create')

	</div>



	<div class="row">
		
		@include('pic_adds.create')
		@include('link_adds.create')
		
	</div>

<hr>

<!-- LIST OF ITEMS ADDED TO WEBSITE -->

<h4>Games</h4>

<div class="row">

@foreach($games as $game)

	<div class="col-md-3">
		<div class="panel panel-info">
		  <div class="panel-heading">
		    <h3 class="panel-title">{{ $game->title }}</h3>
		  </div>
		  <div class="panel-body">
		    <img src="{{ $game->getImagePath() }}" class="img-rounded img-responsive" alt="Responsive image" width="230px" height="230px">
		    
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
					<form action="{{ route('games.destroy', [$game->id]) }}" method="post">
						<input type="hidden" name="_method" value="delete">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="submit" value="Delete" class="btn btn-xs btn-danger">
					</form>
				</div>
				<div class="col-md-6">
					<a class="btn btn-xs btn-warning" href="{{ route('games.edit', [$game->id]) }}">Edit</a>
				</div>	
			</div>

		  </div>
		</div>		
	</div>

@endforeach

</div>

<hr>

<h4>Top Banners</h4>

	<div><img src="images/banner.jpg"></div>
	<div  style="margin-bottom: 10px;" class="row">
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

	<div><img src="images/banner.jpg"></div>
	<div style="margin-bottom: 10px;" class="row">
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

<hr>

<h4>Bottom Banners</h4>

	<div><img src="images/banner.jpg"></div>
	<div style="margin-bottom: 10px;" class="row">
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

	<div><img src="images/banner.jpg"></div>
	<div style="margin-bottom: 10px;" class="row">
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

<hr>

<h4>Pic Adds</h4>

<div class="row">

	<div class="col-md-3">
	<img src="/images/image.svg" class="img-rounded img-responsive" alt="Responsive image" width="260px" height="260px">
	This page showcases games developed by the talented Flash developers who have earned cash sponsorships from Kongregate. If you are a Flash game designer who wants to earn some money and
	<div style="margin-bottom: 10px;" class="row">
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

	<div class="col-md-3">
	<img src="/images/image.svg" class="img-rounded img-responsive" alt="Responsive image" width="260px" height="260px">
	This page showcases games developed by the talented Flash developers who have earned cash sponsorships from Kongregate. If you are a Flash game designer who wants to earn some money and
	<div style="margin-bottom: 10px;" class="row">
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

<hr>

<h4>Link Adds</h4>

<div class="row">
 	<div class="col-md-6">
 	<p>Link name</p>
 	</div>
 	<div class="col-md-3">
		<form action="#" method="post">
			<input type="hidden" name="_method" value="delete">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="submit" value="Delete" class="btn btn-xs btn-danger">
		</form>
	</div>
	<div class="col-md-3">
		<a class="btn btn-xs btn-warning" href="#">Edit</a>
	</div>	
</div>

<div class="row">
 	<div class="col-md-6">
 	<p>Link name</p>
 	</div>
 	<div class="col-md-3">
		<form action="#" method="post">
			<input type="hidden" name="_method" value="delete">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="submit" value="Delete" class="btn btn-xs btn-danger">
		</form>
	</div>
	<div class="col-md-3">
		<a class="btn btn-xs btn-warning" href="#">Edit</a>
	</div>	
</div>

<div class="row">
 	<div class="col-md-6">
 	<p>Link name</p>
 	</div>
 	<div class="col-md-3">
		<form action="#" method="post">
			<input type="hidden" name="_method" value="delete">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="submit" value="Delete" class="btn btn-xs btn-danger">
		</form>
	</div>
	<div class="col-md-3">
		<a class="btn btn-xs btn-warning" href="#">Edit</a>
	</div>	
</div>




</div>


@endsection
