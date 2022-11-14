@extends('partials.layout')

@section('title', 'EditUser')

@section('content')

    <h1>Edit Student N° {{ $user->id }}</h1>
    <form method="POST" action="{{ route('students.update', $user) }}">
        @method('PATCH')
        @include('students.partials._form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
