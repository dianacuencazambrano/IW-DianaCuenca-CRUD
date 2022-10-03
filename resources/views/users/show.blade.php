@extends('partials.layout')

@section('title', 'ShowUser')

@section('content')
    <br>
    <h1 style="margin-left: 10px">User</h1>
    <div class="card text-center" style="width: 18rem; margin-left: 10px">
        <div class="container" style="align-items: center;">
            <img class="card-img-top" src="/img_avatar.jpg" alt="Avatar">
            <div class="card-body">
                <h4 class="card-title"><b>{{ $user->name . ' ' . $user->lastname }}</b></h4>
                <p>
                    @if ($user->status == 1)
                        <td>Active</td>
                    @else
                        <td>Inactive</td>
                    @endif
                </p>
                <hr>
                <a href="{{ route('users.edit', $user) }}" class="card-link">Update</a>
                <form method="POST" action="{{ route('users.delete', $user) }}">
                    @csrf @method('DELETE')
                    <a href="{{ route('users.index') }}" class="card-link">Disable</a>
                </form>
            </div>
        </div>
    </div>

@endsection
