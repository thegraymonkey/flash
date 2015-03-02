<table class="table" >
	@foreach($comments as $comment)
	<tr>
		<td width="8%">				
			<img src="../images/blank.png"/>			
		</td>
		<td width="13%" class="text-primary">
			<small>{{ $comment->name }}</small> </br>	
			<small>{{ $comment->created_at->diffForHumans() }}</small>
		</td>
		<td width="65%">{{ $comment->content}}</td>
		<td width="8%">	
			@if(Auth::check())		
			<form action="{{ route('comments.destroy', [$comment->id]) }}" method="post">
				<input type="hidden" name="_method" value="delete">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" value="Delete" class="btn btn-xs btn-danger">
			</form>	
			@endif		
		</td>		
	</tr>
	@endforeach
</table>