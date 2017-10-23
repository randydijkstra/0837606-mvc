@extends('base')

@section('content')
<div class="container">

  <div class="container">
    <a class="btn btn-default" href="/posts"><span class="btn-back"><</span>Posts overview</a>
    <div class="panel panel-body">
      <h1>{{ $post->title }}</h1>
    </div>
  </div>
  <div class="container">
    <div class="panel panel-heading">
      <p>{{ $user->firstname }} {{ $user->lastname }}</p>
    </div>
    <div class="panel panel-body">
      <div class="content">
        <p>{{ $post->message }}</p>
      </div>
    </div>
  </div>
</div>
@endsection
