@extends('base')

@section('content')
<div class="container">
  <a class="btn btn-default" href="/admin"><span class="btn-back">< </span>Admin panel</a>

  <h2>Admin - All Players</h2>

  @foreach ($users as $user)
    <div class="row user">
      <div class="col-md-6 col-md-offset-2">
        <div class="panel-heading">{{$user->firstname}} {{$user->lastname}}</div>
        <p>{{$user->email}} | Amount of posts: [somenumber]</p>
      </div>
      <div class="col-md-4">
        <a class="btn btn-primary" href="/profile/{{$user->id}}">View</a>
        <a class="btn btn-warning" href="/profile/{{$user->id}}/edit">Edit</a>
        {{-- <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete? There is no turning back!')">Delete</a> --}}
      </div>
    </div>
    <hr>
  @endforeach

</div>
@endsection
