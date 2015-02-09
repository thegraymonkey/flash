@foreach($bottomAdds as $add)
<div style="margin-bottom: 10px;">
	<a href="{{ $add->link }}"><img src="{{ $add->getImagePath() }}"></a>
</div>
@endforeach