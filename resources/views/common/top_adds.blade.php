@foreach($topAdds as $add)
<div style="margin-bottom: 10px;">
	<a href="{{ $add->link }}"><img src="{{ $add->getImagePath() }}" alt="Hot candy-land" height="90" width="728"></a>
</div>
@endforeach