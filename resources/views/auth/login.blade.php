@extends('partials.layout')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <p>{{ Auth::user() }}</p>
    <form method="POST">
        @csrf
        <label>
            <input name="email" type="email" placeholder="Email" required autofocus>
        </label><br>
        <label>
            <input name="password" type="password" placeholder="Password" required>
        </label><br>
        <label> Remember me
            <input type="checkbox" name="remember">
        </label><br>
        <button type="submit">Login</button>
    </form>

@endsection
