@extends('partials.layout')

@section('title', 'ShowReinforcement')

@section('content')
    <br>
    <h1 style="margin-left: 10px">Reinforcement {{ $reinforcement->id_rein }}</h1>
    <div class="card text-center" style="width: 18rem; margin-left: 10px">
        <div class="container" style="align-items: center;">
            <img class="card-img-top" style="width: 25%" src="/img_avatar.jpg" alt="Avatar">
            <div class="card-body">
                <p>{{ $reinforcement->skill->title_skill ?? 'not found' }}</p>
                <p>{{ $reinforcement->title_rein }}</p>
                <p>{{ $reinforcement->description_rein }}</p>
                <p>{{ $reinforcement->status->name_status ?? 'not found' }}</p>
                <hr>
                <a href="{{ route('reinforcements.edit', $reinforcement) }}" class="card-link">Update</a>
                <a href="#" onclick="document.getElementById('change-status').submit()"
                    class="card-link">{{ $action }}</a>
                <form id="change-status" method="POST" action="{{ route('reinforcements.changeStatus', $reinforcement) }}">
                    @csrf @method('PATCH')

                </form>
            </div>
        </div>
    </div>

@endsection
