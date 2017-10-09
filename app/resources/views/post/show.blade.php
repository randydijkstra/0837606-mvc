@extends('base')

@section('content')
<div class="container">

  <div class="container">
    <a class="btn btn-default" href="/profile"><span class="btn-back"><</span>Players overview</a>
    <div class="panel panel-body">
      <h2>{{ $user->firstname }} {{ $user->lastname }}</h2>
      <p>Area: {{ $profile->location }} <br> Home field: {{ $profile->home_field }}</p>
    </div>
  </div>
  <div class="container">
    <div class="panel panel-heading">
      <h2>Post title</h2>
    </div>
    <div class="panel panel-body">

      <div class="content userinfo">
        <p>Name name <br> postdate</p>
      </div>
      <div class="content">
        <p>Here comes the post content</p>
      </div>

    </div>
    <div class="panel panel-body">
      <div class="content comments col-md-8 col-md-offset-2">
        <p><strong>username</strong></p>
        <p>here comes the post comments</p>
      </div>

    </div>
  </div>
</div>
@endsection
