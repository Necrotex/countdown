<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>C0RE :: Timer</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">

</head>
<body>
<div id="wrap">

    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <span class="pull-left">CORE :: TIMER</span>
                </a>
            </div>
        </div>
    </div>


    <div class="container content">
        @yield('content')
    </div>

</div>

<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'auth' => Auth::check()
    ]); ?>
</script>

<script src="{{ elixir('js/app.js') }}"></script>

</body>
</html>