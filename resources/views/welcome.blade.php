@extends('layout')

@section('content')

@include('common.top_adds')

@if(!Cookie::has('warning_off'))
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <h1><strong>WAIT A SECOND!</strong> <br>
  	This site contain explicit adult content and strong language! <br>
  	If you are underage please leave. <h1>
</div>
@endif

<h4 class="text-primary">Todays Free Games</h4>

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




@stop

@section('bottomjs')

<script type="text/javascript">
$(function() {
    	$('button.close').on('click', function(){

    		$.get('/warning/off');

    	});
});
</script>
@stop