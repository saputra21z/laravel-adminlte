@extends('templates.auth')

@section('content')
<div class="login-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="{{ route('register')}}" method="post">
      @csrf
      <div class="form-group has-feedback  @error('password') has-error @enderror ">
        <input type="text" name="name" class="form-control" placeholder="fullname" value="{{ old('email') }}">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @error('name')
        <small class="help-block">{{$message}}</small>
        @enderror
      </div>
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
      <div class="form-group has-feedback ">
        <input type="password" name="password_confirmation" class="form-control" placeholder="confirm password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   

    <a href="{{ route('password.request')}}">I forgot my password</a><br>
    <a href="{{route('register')}}" class="text-center">I already have a membership</a>

  </div>
@endsection
