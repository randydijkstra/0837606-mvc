@extends('base')

@section('content')
<div class="container">

  <h2>Posts</h2>



  @foreach ($posts as $post)
    <div class="row post">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $post->title }}</div>
                <div class="panel-body">
                  <p>Author: {{ $post->user->firstname }} {{ $post->user->lastname }}</p>
                  <p>{{ $post->message }}</p>
                </div>
            </div>
        </div>
    </div>
  @endforeach


</div>
@endsection
