@extends('layouts.app')

@section('content')

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
    </div>
@endsection
