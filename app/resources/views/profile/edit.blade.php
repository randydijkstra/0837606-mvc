@extends('base')

@section('content')
<div class="container">

  <h2>Edit profile</h2>


    <div class="row user">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">{{ $user->firstname }} {{ $user->lastname}}</div>
                <div class="panel-body">
                  
                  @if ($user->profile)
                    <p>Location: {{ $user->profile->location }}</p>
                    <p>Home field: {{ $user->profile->home_field }}</p>
                  @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
