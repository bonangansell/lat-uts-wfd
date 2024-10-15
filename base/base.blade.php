<!DOCTYPE html>
<html>
    <head>
    <title>hello</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- @vite('resources/css/app.css') -->
    </head>
    <body>
    @include('includes.sidenav')

    @yield('content')

    @include('includes.footer')
    </body>
</html>