<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Checklist-app</title>
    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
    <script>
      window.Laravel = { csrfToken: '{{ csrf_token() }}', basePath: '{{ url("/") }}/' }
    </script>
</head>

<body>
<div class="container">
    <div class="container content-body">
        @yield('content')
    </div>
    @yield('footer')
</div>

</body>
</html>