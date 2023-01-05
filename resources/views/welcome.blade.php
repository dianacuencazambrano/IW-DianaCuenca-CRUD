@extends('partials.layout')

@section('title', 'Welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Qualification Criteria</h1>
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
                    </tr>
                </thead>
                <tbody>
                    @forelse($quals as $qual)
                        <tr> 
                            <th>{{ $qual->id_qual }}</th>
                            <td>{{ $qual->scale_qual }}</td>
                            <td>{{ $qual->meaning_qual }}</td>
                            <td>{{ $qual->description_qual }}</td>
                            <td>{{ $qual->status->name_status ?? 'not found' }}</td>
                        </tr>
                    @empty
                        <li>Empty list of Qualifications</li>
                    @endforelse

                </tbody>
            </table>
        </ul>
        
        <h1>{{ 'NE: ' .$cont_NE. ' EP: ' .  $cont_EP . ' A: ' . $cont_A }}</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Classrooms</h1>
            </div>
        </div>
    
    <ul>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Description</th>
                    <th scope="col">Identifier</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($classrooms as $class)
                    <tr>
                        <th>{{ $class->id_class }}</th>
                        <td>{{ $class->description_class }}</td>
                        <td>{{ $class->identifier_class }}</td>
                        <td>{{ $class->status->name_status ?? 'not found' }}</td>
                    </tr>
                @empty
                    <li>Empty list of Qualifications</li>
                @endforelse

            </tbody>
        </table>
    </ul>
</div>

@endsection
