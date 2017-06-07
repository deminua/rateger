@extends('layouts.app')

@section('content')



    <vuecrypt></vuecrypt>


<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body sign">
                                <h1>{{ __('auth.login') }}</h1>
                                <p class="text-muted">Авторизацию и регистрацию можно выполнить только через социальные сети, кликните на одну из сетей в которой вы состоите и мы предоставим доступ к сервису</p>

                            <div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-lg-10 col-lg-offset-1">
                                        <a href="{{ route('social', 'facebook') }}" class="btn btn-block btn-social btn-facebook"><span class="fa fa-facebook"></span>  Вход через Facebook</a>
                                        <a href="{{ route('social', 'google') }}" class="btn btn-block btn-social btn-google"><span class="fa fa-google"></span> Вход через Google</a>            
                            </div>
                 </div>
            </div>
        </div>


    </div>
</div>
@endsection
