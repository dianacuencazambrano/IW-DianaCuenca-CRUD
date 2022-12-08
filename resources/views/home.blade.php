@extends('partials.layout')

@section('title', 'Scores')

@section('content')

    <h1>Home</h1>
    @if (auth()->user()->id_status == 1)

        
        <h2>Skill</h2><b>
        <p>Grade:</p>
        <h2>Reinforcement Tittle:</h2>
        <p>Reinforcement Description</p>




    @else
    <p>Your user is disable. Please contact support</p>
    @endif
    

@endsection
