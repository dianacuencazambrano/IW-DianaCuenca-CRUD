@extends('partials.layout')

@section('title', 'EditUser')

@section('content')

    <h1>Edit User | N° {{ $user->id }}</h1>
    <form method="POST" action="{{ route('users.update', $user) }}">
        @method('PATCH')
        @include('users.partials._form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
