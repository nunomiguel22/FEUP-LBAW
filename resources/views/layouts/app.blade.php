<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- scripts -->
  <script type="text/javascript">
    // Fix for Firefox autofocus CSS bug
    // See: http://stackoverflow.com/questions/18943276/html-5-autofocus-messes-up-css-loading/18945951#18945951
  </script>

  <script src="{{ asset('bootstrap/jquery-3.3.1.slim.min.js') }}" defer></script>
  <script src="{{ asset('bootstrap/popper.min.js') }}" defer></script>
  <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" defer></script>
  <script src="{{asset('js/app.js')}}" defer></script>
  @yield('scripts')

  <!-- Styles -->
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
  <main>
    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

  </main>
</body>



</html>