@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container mt-4">
        <h2>Login</h2>
        <form action="{{route('handleLogin')}}" method="POST">
        @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            @error('email')
                <p class="help-blok text-danger">{{' * ' . $message}}</p>
            @enderror
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            @error('password')
                 <p class="help-blok text-danger">{{' * ' . $message}}</p>
             @enderror
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection