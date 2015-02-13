<h4 class="text-warning">Best Game Websites</h4>

<hr>

<div class="list-group">
  @foreach($linkAdds as $add)
  <a href="{{ $add->link }}" class="list-group-item" target="blank">
    <h4 class="list-group-item-heading">{{ $add->title }}</h4>
    <p class="list-group-item-text">{{ $add->description }}</p>
  </a>
  @endforeach
</div>