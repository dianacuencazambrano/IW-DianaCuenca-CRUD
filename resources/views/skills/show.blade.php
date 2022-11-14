@extends('partials.layout')

@section('title', 'ShowSkill')

@section('content')
    <br>
    <h1 style="margin-left: 10px">Skill {{ $skill->id_skill }}</h1>
    <div class="card text-center" style="width: 18rem; margin-left: 10px">
        <div class="container" style="align-items: center;">
            <img class="card-img-top" style="width: 25%" src="/img_avatar.jpg" alt="Avatar">
            <div class="card-body">
                <p>{{ $skill->title_skill }}</p>
                <p>{{ $skill->description_skill }}</p>
                <p>{{ $skill->status->name_status ?? 'not found' }}</p>
                <hr>
                <a href="{{ route('skills.edit', $skill) }}" class="card-link">Update</a>
                <a href="#" onclick="document.getElementById('change-status').submit()"
                    class="card-link">{{ $action }}</a>
                <form id="change-status" method="POST" action="{{ route('skills.changeStatus', $skill) }}">
                    @csrf @method('PATCH')

                </form>
            </div>
        </div>
    </div>

@endsection
