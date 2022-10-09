@extends('partials.layout')

@section('title', 'CreateUser')

@section('content')

    <h1 style="text-align: center">Create User</h1>
    <form method="POST" action="{{ route('users.store') }}">
        @include('users.partials._form')
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection
