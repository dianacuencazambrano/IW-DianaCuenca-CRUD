@extends('partials.layout')

@section('title', 'CreateReinforcement')

@section('content')

    <h1 style="text-align: center">Create reinforcement</h1>
    <form method="POST" action="{{ route('reinforcements.store') }}">
        @include('reinforcements.partials._form')
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection
