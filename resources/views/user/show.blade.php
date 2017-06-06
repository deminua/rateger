<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">


<div class="container">
    <div class="row">
        <div class="col-sm-12 user">
            <div class="container header">

                <div class="row">
                        <img class="col-sm-3 col-xs-4 avatar" width="100%" src="/storage/avatars/512/{{ $user->avatar }}">

                        <h1 class="col-sm-9 col-xs-8">{{ $user->name }} {{ $user->surname }}</h1>
                        <div class="col-sm-9">
                            <h2 style="float:left;">4.2<sub>32</sub></h2>
                            <div style="float:left; margin-left: 20px; font-size: 180%">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                        </div>
                </div>

                <div class="row">
                    <hr>
                </div>




            </div>
{{--            <div class="content">
                <hr>
                content
            </div>
            <div class="footer">
                footer
            </div>--}}
        </div>
{{--        <div class="col-sm-3" style="background: #eee">
            right<br>2right<br>2right<br>2right<br>2right<br>2
        </div>--}}
    </div>
</div>



</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>


{{--

<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $user->name }} {{ $user->surname }}</div>
                    <p>{{ $user->slug }}</p>
                    <img width="300px" src="/storage/avatars/512/{{ $user->avatar }}">

                    <div class="panel-body">
                       123
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
