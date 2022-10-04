@extends('partials.layout')

@section('title', 'EditUser')

@section('content')

    <h1>Edit User | N° {{ $user->id }}</h1>
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf @method('PATCH')
        <input hidden name="id" value="{{ $user->id }}">
        <div class="mb-3">
            <input name="name" placeholder="Name" value="{{ old('name', $user->name) }}" required><br>
        </div>
        <div class="mb-3">
            <input name="lastname" placeholder="Last name" value="{{ old('lastname', $user->lastname) }}" required><br>
        </div>
        <div class="mb-3">
            <input name="email" placeholder="Email" value="{{ old('email', $user->email) }}" required><br>
        </div>
        {{-- <input hidden name="password" placeholder="Password" value="{{ old('password') }}" required><br> --}}
        <button type="submit" class="btn btn-primary">Update</button>
        
    </form>

@endsection