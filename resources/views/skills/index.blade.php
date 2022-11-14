@extends('partials.layout')

@section('title', 'Users')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Skills List</h1>
            </div>
            <div class="col-6"></div>
            <div class="col">
                <a href="{{ route('skills.create') }}" type="button" class="btn">NEW</a>
            </div>
        </div>

    </div>


    <ul>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($skills as $skill)
                    <tr>
                        <th scope="row">{{ $skill->id_skill }}</th>
                        <td>{{ $skill->title_skill}}</td>
                        <td>{{ $skill->description_skill }}</td>
                        <td>{{ $skill->status->name_status ?? 'not found'}}</td>
                        <td>
                            <a href="{{ route('skills.show', $skill) }}">Show</a>
                        </td>
                    </tr>
                @empty
                    <li>Empty list of skills</li>
                @endforelse

            </tbody>
    </ul>

@endsection
