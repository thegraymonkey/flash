@extends('layout')
  
@section('content')

@include('common.top_adds')

@include('common.messages')

<h4 class="text-info">Send us an email...</h4>

<div class="well well-lg">

  <form role="form" action="{{ url('contacts/send') }}" method="POST">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" placeholder="Email" name="email" required autofocus>
    </div>

    <div class="form-group">
      <label for="subject">Subject</label>
      <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject">
    </div>

    <div class="form-group">
      <label for="message">Message</label>
      <textarea class="form-control" type="text" id="message" placeholder="Message" name="message"></textarea>
    </div>
    
    <div class="form-group">
    <button type="submit" class="btn btn-primary">Send</button>
    </div>

  </form>

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