@extends('partials.layout')

@section('title', 'EditUser')

@section('content')

    <h1>Edit Skill N° {{ $skill->id_skill }}</h1>
    <form method="POST" action="{{ route('skills.update', $skill) }}">
        @method('PATCH')
        @include('skills.partials._form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
