@extends('base')

@section('content')
<div class="container">

  @if(Session::has('success_msg'))
    <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
  @endif

  <div class="row user">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Edit post</div>
          <div class="panel-body">

          @if ($post)
            <form action="/post/{{ $post->id }}/edit" method="POST" class="form-horizontal">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="control-label col-sm-2" >Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" >Content</label>
                <div class="col-sm-10">
                  <textarea name="message" id="message" class="form-control bigheight">{{ $post->message }}</textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-default" value="Update Post" />
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
