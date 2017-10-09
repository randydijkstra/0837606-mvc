@extends('base')

@section('content')
<div class="container">

  <div class="container">
    <a class="btn btn-default" href="/profile"><span class="btn-back">< </span>Players overview</a>
    <div class="content">
      <h2>{{ $user->firstname }} {{ $user->lastname }}</h2>
      <p>Area: {{ $profile->location }} <br> Home field: {{ $profile->home_field }}</p>
    </div>
  </div>
  <div class="container">
    <div class="panel panel-body">
      <div class="panel panel-heading">
        <h3>Posts by {{ $user->firstname }} {{ $user->lastname }}</h3>
      </div>
      <div class="panel panel-body panel-default col-md-4 col-md-offset-1">
        <h4>Post title</h4>
        <p>post date</p>
        <p>lorem ipsum ofsdjna ibdfjb </p>
        <a class="btn btn-default">View post</a>
      </div>
      <div class="panel panel-body panel-default col-md-4 col-md-offset-1">
        <h4>Post title</h4>
        <p>post date</p>
        <p>lorem ipsum ofsdjna ibdfjb </p>
        <a class="btn btn-default">View post</a>
      </div>
      <div class="panel panel-body panel-default col-md-4 col-md-offset-1">
        <h4>Post title</h4>
        <p>post date</p>
        <p>lorem ipsum ofsdjna ibdfjb </p>
        <a class="btn btn-default">View post</a>
      </div>
    </div>
  </div>
</div>
@endsection
