@extends('layouts.app')

@section('content')

    <vuecrypt></vuecrypt>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('app.dashboard') }}</div>
                <p>{{ auth()->user()->slug }}</p>
                <img width="300px" src="/storage/avatars/{{ auth()->user()->avatar }}">

                <div class="panel-body">
                    You are logged in!
                    {{ session('locale') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
