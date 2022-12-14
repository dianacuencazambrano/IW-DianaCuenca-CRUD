@extends('partials.layout')

@section('title', 'EditReinforcement')

@section('content')

    <h1>Edit Reinforcement N° {{ $reinforcement->id_rein }}</h1>
    <form method="POST" action="{{ route('reinforcements.update', $reinforcement) }}">
        @method('PATCH')
        @include('reinforcements.partials._form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
