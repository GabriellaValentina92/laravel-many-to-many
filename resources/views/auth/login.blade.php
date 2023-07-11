@extends('guest.layouts.base')

@section('contents')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" 
            class="form-control" 
            id="exampleInputEmail1" 
            aria-describedby="emailHelp" 
            name="email" 
            :value="old('email')" 
            required 
            autofocus 
            autocomplete="username">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" 
            class="form-control" 
            id="exampleInputPassword1" 
            name="password"  
            required 
            autocomplete="current-password">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>

        <a href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection
