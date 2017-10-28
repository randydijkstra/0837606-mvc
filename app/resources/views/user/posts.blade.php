@extends('base')



@section('content')
<div class="container">

  <h2>My posts</h2>

  <div class="panel-body">

  @if(Session::has('delete_success_msg'))
    <div class="alert alert-success">{{ Session::get('delete_success_msg') }}</div>
  @endif

  <div class="row post">
    <div class="col-md-4 col-md-offset-2">
      <div class="panel-heading"><strong>Post title</strong></div>
    </div>
    <div class="col-md-6">
      <div class="panel-heading"><strong>Actions</strong></div>
    </div>
  </div>
  <hr>

  @foreach ($posts as $post)
    <div class="row post">
      <div class="col-md-4 col-md-offset-2">
        <div class="panel-heading">{{ $post->title }}</div>
      </div>
      <div class="col-md-6">
        <a class="btn btn-success" href="/post/{{$post->id}}">View</a>
        <a class="btn btn-warning" href="/post/{{$post->id}}/edit">Edit</a>
        <a href="{{ route('post.delete', $post->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
      </div>
    </div>
  @endforeach

  </div>
</div>
@endsection
