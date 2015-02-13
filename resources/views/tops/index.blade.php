@extends('layout')

@section('content')

@include('common.top_adds')


<h4 class="text-warning">Top Rated Games</h4>

<hr>

@include('common.games')

<div class="row">
  <div class="col-md-4 col-md-offset-4">
	{!! $games->render() !!}
  </div>
</div>

@include('common.bottom_adds')

@stop

@section('sidebar')

<div style="margin-bottom:20px;">
@include('common.pic_adds')
</div>
<div style="margin-bottom:20px;">
@include('common.link_adds')
</div>
<div style="margin-bottom:20px;">
@include('common.categories')
</div>
<div style="margin-bottom:20px;">
@include('common.archives')
</div>

@stop