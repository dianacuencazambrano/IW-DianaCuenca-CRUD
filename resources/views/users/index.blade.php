@extends('partials.layout')

@section('title', 'Users')


@section('content')
    <h1>Users List</h1>
    <ul>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->lastname }}</td>
                        @if ($user->status == 1)
                            <td>Active</td>
                        @else
                            <td>Inactive</td>
                        @endif
                        <td>
                            {{-- <a href="{{route ('mostrarusuario', $user)}}">Show</a> --}}
                        </td>
                    </tr>
                @empty
                    <li>Empty list of users</li>
                @endforelse

            </tbody>
    </ul>

@endsection
