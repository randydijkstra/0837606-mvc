@extends('base')

@section('content')
<div class="container">

  <h2>Players</h2>

  <div class="col-md-8 col-md-offset-2 padding-bottom">

    <form action="/profile/" method="GET" class="form-horizontal">
      <div class="form-group">
        <select class="form-control" name="location" id="location">
          @if ($locations)
            @foreach($locations as $location)
              <option value="{{ $location }}">{{ $location }}</option>
            @endforeach
          @endif
        </select>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" class="btn btn-default" value="Apply filter" />
        </div>
      </div>
    </form>
  </div>

  @foreach ($users as $user)
    <div class="row user">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $user->firstname }} {{ $user->lastname}}</div>
                <div class="panel-body">
                  @if ($user->profile)
                    <p>Location: {{ $user->profile->location }}</p>
                    <p>Home field: {{ $user->profile->home_field }}</p>
                  @endif
                  <a class="btn btn-default" href="/profile/{{$user->id}}">View profile</a>
                </div>
            </div>
        </div>
    </div>
  @endforeach

</div>
@endsection
