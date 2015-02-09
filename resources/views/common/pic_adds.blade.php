
@foreach($picAdds as $add)

<h4 class="text-info">{{ $add->title }}</h4>

<hr>

@if($add->thumbnail)
	<img src="{{ $add->thumbnail }}" class="img-rounded img-responsive" alt="Responsive image" width="230px" height="260px">
@else
	<img src="{{ $add->getImagePath() }}" class="img-rounded img-responsive" alt="Responsive image" width="230px" height="260px">
@endif
<p>{{ $add->description }}</p>

@endforeach





