@extends('base')

@section('content')
<div class="container">

  <h2>Edit profile</h2>

  @if(Session::has('success_msg'))
    <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
  @endif
  <div class="row user">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">{{ $user->firstname }} {{ $user->lastname}}</div>
              <div class="panel-body">

                @if ($user->profile)
                  <form action="/profile/{{$user->id}}/edit" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label class="control-label col-sm-2" >Firstname</label>
                      <div class="col-sm-10">
                          <input type="text" name="firstname" id="firstname" class="form-control" value="{{ $user->firstname }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" >Lastname</label>
                      <div class="col-sm-10">
                          <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $user->lastname }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" >Location</label>
                      <div class="col-sm-10">
                          <input type="text" name="location" id="location" class="form-control" value="{{ $user->profile->location}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" >Homefield</label>
                      <div class="col-sm-10">
                          <input type="text" name="homefield" id="homefield" class="form-control" value="{{ $user->profile->home_field }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-default" value="Update Profile" />
                      </div>
                    </div>
                  </form>
                @endif
              </div>
          </div>
      </div>
  </div>

</div>
@endsection
