<header>
  <div class="title m-b-md">
    {{ config('app.name') }} @section('title', 'Home')
  </div>
  @section('links')
  <nav class="links">
    <a href="/users">Users</a>
    <a href="/posts">Posts</a>
  </nav>
  @show
  @if (Route::has('login'))
    <div class="top-right links">
      @auth
        <a href="{{ url('/home') }}">Home</a>
      @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
      @endauth
    </div>
  @endif
</header>
