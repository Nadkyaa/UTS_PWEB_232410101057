@extends('layouts.app')

@section('content')
<div class="login-container">
    <h2>Login</h2>
    <form action="{{ route('proses.login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn-login">Login</button>
    </form>
</div>
@endsection
