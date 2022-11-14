@extends('partials.layout')

@section('title', 'CreateUser')

@section('content')

    <h1 style="text-align: center">Create Student
    </h1>
    <form method="POST" action="{{ route('students.store') }}">
        @include('students.partials._form')
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection
