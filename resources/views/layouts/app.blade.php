<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-DO</title>

    @include('libraries\styles')
</head>

<body>
    @include('components.nav')
    @yield('content')
    @include('libraries\scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    @stack('js')
</body>

</html>