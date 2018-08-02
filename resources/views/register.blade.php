@extends('layouts.master')

@section('content')
<div class="row">
  <div class="loginmodal-container">
        <h1>Sign up</h1><br>

        <form action="/register" method="POST">
            {{ csrf_field() }}
            <div class="form-group has-error">
                <input type="text" name="login" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="login loginmodal-submit" value="Login">Sign up</button>
            </div>
            @include('partials.errors')
        </form>

        <div class="login-help">
            <a href="/">Login</a>
        </div>
    </div>
</div>
@endsection

@section('navbar')
    @include('partials.auth_navbar')
@endsection