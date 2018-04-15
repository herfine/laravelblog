@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="/"><b>My</b>Blog</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : ' ' }} ">
                <input type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" name="email" >
                <span class="fa fa-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="help-block"> {{ $errors->first('email') }} </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : ' ' }}">
                <input type="password" class="form-control" placeholder="Password" name="password" >
                <span class="fa fa-lock form-control-feedback"></span>

                @if($errors->has('password'))
                    <span class="help-block">{{$errors->first('password')}}</span>
                @endif
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember')?'checked':''}}> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <br>
        <a href="#">I forgot my password</a><br>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection