@extends('guest.layouts.base')

@section('contents')
<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" 
        class="form-control" 
        id="name" 
        aria-describedby="emailHelp" 
        name="name" 
        :value="old('name')" 
        required 
        autofocus 
        autocomplete="name">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" 
        class="form-control" 
        id="exampleInputEmail1" 
        aria-describedby="emailHelp" 
        name="email" 
        :value="__('Name')" 
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

    <div class="mb-3">
        <label for="password_confirmation" class="form-label"> Confirm Password</label>
        <input type="password" 
        class="form-control"
        :value="__('Confirm Password')" 
        id="password_confirmation" 
        name="password"  
        name="password_confirmation" 
        required 
        autocomplete="new-password">
    </div>

    <a href="{{ route('login') }}">
        {{ __('Already registered?') }}
    </a>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection
