
@foreach($picAdds as $add)

<h4 class="text-info">{{ $add->title }}</h4>

<hr>

@if($add->thumbnail)
	<a href="{{ $add->link }}"><img src="{{ $add->thumbnail }}" class="img-rounded img-responsive" alt="Responsive image" width="260px" height="260px"></a>
@else
	<a href="{{ $add->link }}"><img src="{{ $add->getImagePath() }}" class="img-rounded img-responsive" alt="Responsive image" width="260px" height="260px"></a>
@endif
<p>{{ $add->description }}</p>

@endforeach





