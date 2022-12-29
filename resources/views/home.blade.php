@extends('partials.layout')

@section('title', 'Scores')

@section('content')

    <h1>Home</h1>
    @if (auth()->user()->id_status == 1)
        @foreach ($reinforcements as $rein)
            <br>
            <table class="table">
                <tr>
                    <th>Skill</th>
                    <td>{{ $rein->skill->title_skill }}</td>
                </tr>
                <tr>
                    <th>Grade</th>
                    <td>EP | En Proceso</td>
                </tr>
                <tr>
                    <th>Reinforcement Tittle</th>
                    <td>{{ $rein->rein->title_rein }}</td>
                </tr>
                <tr>
                    <th>Reinforcement Description</th>
                    <td>{{ $rein->rein->description_rein }}</td>
                </tr>
            </table>
        @endforeach
    @else
        <p>Your user is disable. Please contact support</p>
    @endif
@endsection
