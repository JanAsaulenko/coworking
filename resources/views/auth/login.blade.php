@extends('layouts.app')

@section('Content')
<div class="container">
    <div class="row">
        <div class="col-md-3 col-md-offset-9">
            <div class="panel panel-default">
                <div class="panel-heading">Вхід</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control form-custom" name="email" placeholder="E-mail*" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control form-custom" placeholder="Pasword*" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-custom col-md-12">
                                    УВІЙТИ
                                </button>

                                <a class="losted btn-link col-md-12" href="{{ url('/password/reset') }}">
                                    Заубли ім'я чи пароль?
                                </a>
                                <a class="new_user btn-link" href="{{ url('/register') }}">
                                    Новий користувач?
                                </a>
                                <a type="button" class="btn btn-custom col-md-12" href="{{ url('/register') }}">
                                    ЗАРЕЄСТРУВАТИСЬ
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
