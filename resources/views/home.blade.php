@extends('partials.layout')

@section('title', 'Scores')

@section('content')

    <h1>Home</h1>
    @if (auth()->user()->id_status == 1)
            @foreach ($quals as $qual)
                <h2>Skill: {{$qual->skill->title_skill}}</h2><b>
                <p>Grade: {{$qual->rein}}</p>
                <h2>Reinforcement Tittle:</h2>
                <p>Reinforcement Description</p>
            @endforeach
        @else
            <p>Your user is disable. Please contact support</p>
    @endif


@endsection
