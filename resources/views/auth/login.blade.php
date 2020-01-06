@extends('templates.auth')

@section('content')
<div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{ route('login')}}" method="post">
        @csrf
      <div class="form-group has-feedback @error('email') has-error @enderror">
      <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @error('email')
        <small class="help-block">{{$message}}</small>
        @enderror
      </div>
      <div class="form-group has-feedback  @error('password') has-error @enderror ">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password')
        <small class="help-block">{{$message}}</small>
        @enderror
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
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

   

    <a href="{{ route('password.request')}}">I forgot my password</a><br>
    <a href="{{route('register')}}" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
@endsection
