@extends('partials.layout')

@section('title', 'CreateUser')

@section('content')

<h1 style="text-align: center">Create User</h1>
    
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <hr width="1000x">
        <label><h3>Basic Information</h3></label>
        <div class="mb-3">
            <input name="name" type="" placeholder="Name" value="{{ old('name') }}" required><br>
        </div>
        <div class="mb-3">
            <input name="lastname" type="text" placeholder="Last name" value="{{ old('lastname') }}" required><br>
        </div>
        <div class="mb-3">
            <input name="birthday" type="date" placeholder="Birthday date" value="{{ old('birthday') }}" required><br>
        </div>
        <div class="mb-3">
            <input name="identification" type="number" placeholder="Identification" value="{{ old('identification') }}" required><br>
        </div>
        <div class="mb-3">
            <input name="phoneNumber" type="tel" placeholder="Phone Number" value="{{ old('phoneNumber') }}" required><br>
        </div>
        <div class="mb-3">
            <textarea name="homeAddress" type="number" placeholder="Home Address" value="{{ old('phoneNumber') }}" required></textarea><br>
        </div><br>
        <label>Login Information</label>
        <div class="mb-3">
            <input name="email" type="email" placeholder="Email" value="{{ old('email') }}" required><br>
        </div>
        <div class="mb-3">
            <input name="password" type="password" placeholder="Password" required><br>
        </div>
        {{-- <div class="mb-3">
            <input name="confirmPassword" type="password" placeholder="Confirm password" value="{{ old('confirmPassword') }}" required><br>
        </div> --}}
        <button type="submit" class="btn btn-primary">Save</button>
        
    </form>

@endsection
