@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{ __('menu.sign_up') }}</h1></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{--<label for="name" class="col-md-4 control-label">Name</label>--}}

                            <div class="col-sm-6 col-sm-offset-3">
                                <input id="name" type="text" class="form-control" placeholder="Name" name="{{ __('auth.name') }}" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            <div class="col-sm-6 col-sm-offset-3">
                                <input id="email" type="email" class="form-control" placeholder="{{ __('auth.email') }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            <div class="col-sm-6 col-sm-offset-3">
                                <input id="password" type="password" placeholder="{{ __('auth.password') }}" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                            <div class="col-sm-6 col-sm-offset-3">
                                <input id="password-confirm" type="password" placeholder="{{ __('auth.password-confirm') }}" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('auth.register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
