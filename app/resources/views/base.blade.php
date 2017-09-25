<!doctype html>
<html lang="{{ app()->getLocale() }}">
    @include('includes/head')
    <body>
      @include('includes/header')

      <div class="wrapper flex-center position-ref">

        @section('content')
          <div class="content">

            <p>Latest posts here...</p>

          </div>
        @show
      </div>
      @include('includes/footer')
      <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
