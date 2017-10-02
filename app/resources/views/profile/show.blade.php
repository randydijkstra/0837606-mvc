@extends('base')

@section('content')
<div class="container">
  <a class="btn btn-default" href="/profile"><span class="btn-back"><</span>Profile overview</a>

  <h2>Profile</h2>
  <ul>
    <li>{{ $user->firstname }}</li>
    <li>{{ $user->lastname }}</li>

    <li>{{ $profile->location }}</li>
    <li>{{ $profile->home_field }}</li>
  </ul>

</div>
@endsection
