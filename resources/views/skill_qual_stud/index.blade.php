@extends('partials.layout')

@section('title', 'Register Scores')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Students List</h1>
            </div>
        </div>
        <ul>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Student</th>
                        @foreach ($skills as $skill)
                            <th scope="col">{{ $skill->title_skill }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $stud)
                        <tr>
                            <th>{{ $stud->user->name . ' ' . $stud->user->lastname }}</th>
                            @foreach ($skills as $skill)
                                @foreach ($skill_qual_stud as $score)
                                    @if ($score->id_skill == $skill->id_skill && $score->id_stud == $stud->id_stud)
                                        <a href="" class="update" data-type="text" data-pk="{{ $score->id ?? null }}"
                                            data-title="Enter the score">
                                            <td>{{ $score->qual->scale_qual ?? 'NE' }}</td>
                                        </a>
                                        @else
                                    @endif
                                @endforeach
                                {{-- <a href="" class="update" data-type="text" data-pk="{{$score->id}}"><td>{{$score}}</td></a> --}}
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </ul>
    </div>
@endsection
