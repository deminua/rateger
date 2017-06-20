<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (!auth()->guest())<meta name="sid" content="{{ session()->getId() }}">@endif

    <script type="text/javascript">
        <?php
            $security['csrfToken'] = csrf_token();
            if(!auth()->guest()) { $security['sid'] = session()->getId(); }

            ?>
            window.Laravel = <?php echo json_encode($security); ?>
    </script>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">

    <div class="container">
        <div class="row">
            <div class="col-sm-12 user">

                <three1></three1>



            </div>
        </div>
    </div>



</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
