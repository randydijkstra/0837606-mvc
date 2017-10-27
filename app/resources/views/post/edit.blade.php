@extends('base')


@if ($user->profile)
  <p>Location: {{ $user->profile->location }}</p>
  <p>Home field: {{ $user->profile->home_field }}</p>

  <form action="/profile/edit" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    <div class="form-group">
      <label class="control-label col-sm-2" >Title</label>
      <div class="col-sm-10">
          <input type="text" name="firstname" id="firstname" class="form-control" value="{{ $user->firstname }}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Content</label>
      <div class="col-sm-10">
        <textarea name="content" id="content" class="form-control">{{ $post->content }}</textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-default" value="Update Post" />
      </div>
    </div>
  </form>
@endif
