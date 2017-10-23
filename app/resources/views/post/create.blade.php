@extends('base')

@section('content')

  <div class="panel-body">

    <h1>New post</h1>

    <!-- Display Validation Errors -->
    @include('includes.errors')

    <!-- New Post Form -->
    <form action="/post" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Post title and message -->
        <div class="form-group">
          <div class="col-sm-12">
            <label for="post" class="col-sm-3 control-label">Post title</label>
            <div class="col-sm-8">
              <input type="text" name="title" id="post-title" class="form-control">
            </div>
          </div>
          <div class="col-sm-12">
            <label for="post" class="col-sm-3 control-label">Post message</label>
            <div class="col-sm-8">
              <textarea rows="8" name="message" id="post-message" class="form-control"></textarea>
            </div>
          </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-6">
                <button type="submit" class="btn btn-default">Submit post</button>
            </div>
        </div>
    </form>
  </div>

@endsection
