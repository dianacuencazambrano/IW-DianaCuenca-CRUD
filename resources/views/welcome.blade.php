@extends('partials.layout')

@section('title', 'Welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Qualification Criteria</h1>
            </div>
        </div>
    </div>
    <ul>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Scale</th>
                    <th scope="col">Meaning</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($quals as $qual)
                    <tr>
                        <th scope="row">{{ $qual->id_qual }}</th>
                        <td>{{ $qual->scale_qual}}</td>
                        <td>{{ $qual->meaning_qual}}</td>
                        <td>{{ $qual->description_qual }}</td>
                        <td>{{ $qual->status->name_status ?? 'not found'}}</td>
                    </tr>
                @empty
                    <li>Empty list of Qualifications</li>
                @endforelse

            </tbody>
    </ul>

@endsection
