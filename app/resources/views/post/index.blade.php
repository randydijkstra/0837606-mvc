@extends('base')

@section('content')
<div class="container">

  <h2>Posts</h2>

  @if(Session::has('success_msg'))
    <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
  @endif

  @foreach ($posts as $post)
    <div class="row post">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $post->title }}</div>
                <div class="panel-body">
                  <p>Author: <a href="/profile/{{$post->user->id}}">{{ $post->user->firstname }} {{ $post->user->lastname }}</a></p>
                  <p>{{ $post->message }}</p>
                  <a class="btn btn-default" href="/post/{{$post->id}}">View full post</a>
                </div>
            </div>
        </div>
    </div>
  @endforeach

  @if ($posts->links())
    <div class="col-md-6 col-md-offset-3">
      <p>{{ $posts->links() }}</p>
    </div>
  @endif
</div>
@endsection
