@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container mt-4">
    <h2>Register</h2>
    <form action="{{route('handleRegister')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Username</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        @error('name')
        <p class="help-blok text-danger">{{' * ' . $message}}</p>
        @enderror
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

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" required>
        </div>
        @error('password_confirmation')
        <p class="help-blok text-danger">{{' * ' . $message}}</p>
        @enderror
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection