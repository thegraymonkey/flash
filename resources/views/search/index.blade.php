@extends('layout')

@section('content')

@include('common.top_adds')


<h4 class="text-success">Search Results For: {{ $query }}</h4>

<hr>

@include('common.games')

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