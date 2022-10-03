@extends('partials.layout')

@section('title', 'CreateUser')

@section('content')

    <h1>Create User</h1>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="mb-3">
            <input name="name" placeholder="Name" value="{{ old('name') }}" required><br>
        </div>
        <div class="mb-3">
            <input name="lastname" placeholder="Last name" value="{{ old('lastname') }}" required><br>
        </div>
        <div class="mb-3">
            <input name="email" placeholder="Email" value="{{ old('email') }}" required><br>
        </div>
        <div class="mb-3">
            <input name="password" placeholder="Password" value="{{ old('password') }}" required><br>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        
    </form>

@endsection
