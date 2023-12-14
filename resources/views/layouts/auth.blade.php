<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>

  <link rel="shortcut icon" href="{{ url('assets/images/favicon.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ url('assets/compiled/css/app.css') }}">
  <link rel="stylesheet" href="{{ url('assets/compiled/css/app-dark.css') }}">
  <link rel="stylesheet" href="{{ url('assets/compiled/css/auth.css') }}">
  <link rel="stylesheet" href="{{ url('assets/styles/main.css') }}">

</head>
<body>

  <script src="{{ url('assets/static/js/initTheme.js') }}"></script>
  <div id="auth">

    <div class="row h-100">
      <div class="col-lg-5 col-12">
        <div id="auth-left">
          <div class="auth-logo">
            <a href="{{ route('index') }}"><img src="{{ url('assets/images/logo.png') }}" alt="Logo"></a>
          </div>
          <h1 class="auth-title">@yield('title')</h1>
          <p class="auth-subtitle mb-5">@yield('subtitle')</p>
          @yield('content')
        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
      </div>
    </div>

  </div>
  
</body>
</html>