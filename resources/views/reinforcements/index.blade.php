@extends('partials.layout')

@section('title', 'Reinforcements')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Reinforcements List</h1>
            </div>
            <div class="col-6"></div>
            <div class="col">
                <a href="{{ route('reinforcements.create') }}" type="button" class="btn">NEW</a>
            </div>
        </div>

    </div>


    <ul>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Skill</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($reinforcements as $reinforcement)
                    <tr>
                        <th scope="row">{{ $reinforcement->id_rein }}</th>
                        <td>{{ $reinforcement->skill->title_skill ?? 'not found' }}</td>
                        <td>{{ $reinforcement->title_rein }}</td>
                        <td>{{ $reinforcement->description_rein }}</td>
                        <td>{{ $reinforcement->status->name_status ?? 'not found' }}</td>
                        <td>
                            <a href="{{ route('reinforcements.show', $reinforcement) }}">Show</a>
                        </td>
                    </tr>
                @empty
                    <li>Empty list of reinforcements</li>
                @endforelse

            </tbody>
    </ul>

@endsection
