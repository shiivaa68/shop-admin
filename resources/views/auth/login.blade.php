@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <img src="" width="150" height="150" alt="" class="academyitLogo"/>
            <form class="form-signin" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <h2 class="form-signin-heading">همین حالا وارد شوید</h2>
                <div class="login-wrap">
                    <input id="email" type="email" class="form-control" placeholder="نام کاربری" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                    <input id="password" type="password" class="form-control"  name="password" required placeholder="کلمه عبور">
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                    <label class="checkbox">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        مرا به خاطر بسپار
                        <span class="pull-right">
                    <a href="{{ route('password.request') }}">
                     کلمه عبور را فراموش کرده اید؟
                    </a>
                    </span>
                    </label>
                    <button class="btn btn-lg btn-login btn-block" type="submit" name="btn">ورود</button>
                    <a href="{{ url('login/google') }}" class="btn btn-lg btn-login btn-block">ورود با اکانت گوگل</a>

                </div>

            </form>
        </div>
@endsection
