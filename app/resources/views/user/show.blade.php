@extends('base')

@section('content')
<div class="container">

  <h2>Profile</h2>

  <ul>
      <li>{{ Auth::user()->firstname }} </li>
      <li>{{ Auth::user()->lastname }}</li>
      <li>{{ Auth::user()->emai }}</li>
  </ul>

</div>
@endsection
