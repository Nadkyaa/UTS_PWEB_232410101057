<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Sekolah Sederhana</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('components.navbar')

    <div class="container">
        @yield('content')
    </div>

    @include('components.footer')

</body>
</html>
