@extends('layout')

@section('content')

<div style="margin-bottom: 10px;"><img src="../images/banner.jpg"></div>



<h4 class="text-primary">Game Title</h4>



<embed width="800" height="512" base="http://external.kongregate-games.com/gamez/0022/3733/live/" src="http://external.kongregate-games.com/gamez/0022/3733/live/embeddable_223733.swf" type="application/x-shockwave-flash"></embed><br/>
<h4>Rate this game: * * * * * </h4>

<hr>



<form class="well" method="POST" action="#">
	
	<div class="form-group">
		<label>Wanna leave a comment?</label>
		<textarea  class="form-control" name="content"></textarea>
	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Leave comment"/>
	</div>

</form>


<table class="table well" >
	
	<tr>
		<td width="8%">				
			<img src="../images/blank.png"/>			
		</td>
		<td width="10%">					
			<small>06.11.2013.</small>
		</td>
		<td width="68%">Comentar ko i svaki komentar ... :) yeah that was insane</td>
		<td width="8%">	
			@if(Auth::check())		
			<form action="#" method="post">
				<input type="hidden" name="#" value="#">
				<input type="hidden" name="_method" value="delete">
				<input type="hidden" name="#" value="#">
				<input type="submit" value="Delete" class="btn btn-xs btn-danger">
			</form>	
			@endif		
		</td>		
	</tr>
	<tr>
		<td width="8%">				
			<img src="../images/blank.png"/>			
		</td>
		<td width="10%">					
			<small>06.11.2013.</small>
		</td>
		<td width="68%">Comentar ko i svaki komentar ... :) yeah that was insane</td>
		<td width="8%">			
			<form action="#" method="post">
				<input type="hidden" name="#" value="#">
				<input type="hidden" name="_method" value="delete">
				<input type="hidden" name="#" value="#">
				<input type="submit" value="Delete" class="btn btn-xs btn-danger">
			</form>			
		</td>		
	</tr>
	<tr>
		<td width="8%">				
			<img src="../images/blank.png"/>			
		</td>
		<td width="10%">					
			<small>06.11.2013.</small>
		</td>
		<td width="68%">Comentar ko i svaki komentar ... :) yeah that was insane</td>
		<td width="8%">			
			<form action="#" method="post">
				<input type="hidden" name="#" value="#">
				<input type="hidden" name="_method" value="delete">
				<input type="hidden" name="#" value="#">
				<input type="submit" value="Delete" class="btn btn-xs btn-danger">
			</form>			
		</td>		
	</tr>

</table>

<div style="margin-bottom: 10px;"><img src="../images/banner.jpg"></div>

<div style="margin-bottom: 10px;"><img src="../images/banner.jpg"></div>

@stop

@section('sidebar')

<div style="margin-bottom:20px;">
@include('common.sponsored')
</div>
<div style="margin-bottom:20px;">
@include('common.links')
</div>
<div style="margin-bottom:20px;">
@include('common.categories')
</div>
<div style="margin-bottom:20px;">
@include('common.archives')
</div>

@stop

