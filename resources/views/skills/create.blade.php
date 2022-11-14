@extends('partials.layout')

@section('title', 'CreateUser')

@section('content')

    <h1 style="text-align: center">Create Skill</h1>
    <form method="POST" action="{{ route('skills.store') }}">
        @include('skills.partials._form')
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection
