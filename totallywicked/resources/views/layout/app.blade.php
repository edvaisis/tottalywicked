<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Rick and Morty API</title>
</head>

<body>
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center">
                @yield('header')
            </div>
        </div>
    </div>
</header>

<div class="container-fluid">
    @yield('content')
</div>

<footer>

</footer>

</body>
</html>
