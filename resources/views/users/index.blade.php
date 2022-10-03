@extends('partials.layout')

@section('title', 'Users')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Users List</h1>
            </div>
            <div class="col-6"></div>
            <div class="col">
                <a href="{{ route('users.create') }}" type="button" class="btn btn-info" style="color:aliceblue">NEW</a>
            </div>
        </div>

    </div>


    <ul>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
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
                            <a href="{{ route('users.show', $user) }}">Show</a>
                        </td>
                    </tr>
                @empty
                    <li>Empty list of users</li>
                @endforelse

            </tbody>
    </ul>

@endsection
