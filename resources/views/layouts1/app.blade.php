<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Til paketlar</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap);

        body {
            font-family: "Roboto Slab", serif;
        }

        .table td {
            text-align: center;
        }

        .verticala {
            vertical-align: middle;
        }

        .table-hover > tbody > tr:hover {
            background: #0d6efd;
            color: white;
        }

        tbody > tr > td.verticala:hover {
            background: #25b747;
        }
    </style>
</head>
<body>
<div id="app">
    <a href="https://github.com/akbarali1/dictionary-laravel-vuejs" target="_blank">
        <img style="position: absolute; top: 0; left: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_left_red_aa0000.png" alt="Fork me on GitHub"></img>
    </a>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
