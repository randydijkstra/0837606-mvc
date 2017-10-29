@extends('base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default panel-post">
                <p style="color: hotpink;">Welcome admin</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <ul>
        <li><a href="/admin/users">All users</a></li>
        <li><a href="/admin/posts">All posts</a></li>
      </ul>
    </div>
  </div>
</div>
@endsection
