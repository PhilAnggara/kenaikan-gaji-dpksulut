<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>

  @stack('prepend-style')
  @include('includes.style')
  @livewireStyles
  @stack('addon-style')
  
</head>
<body>
  
  <script src="{{ url('assets/static/js/initTheme.js') }}"></script>
  <div id="app">
    @include('includes.sidebar')
    <div id="main" class='layout-navbar navbar-fixed'>
      @include('includes.navbar')
      <div id="main-content">
        @yield('content')
      </div>
      {{-- @include('includes.footer') --}}
    </div>
  </div>
  
  @stack('prepend-script')
  @include('includes.script')
  @include('sweetalert::alert')
  @livewireScripts
  @stack('addon-script')
  
</body>
</html>