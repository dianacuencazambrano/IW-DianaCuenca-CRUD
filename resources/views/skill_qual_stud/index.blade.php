@extends('partials.layout')

@section('title', 'Register Scores')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Students List</h1>
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
                    <th scope="col">Student</th>
                    @foreach ($skills as $skill)
                        <th scope="col">{{$skill->title_skill}}</th>
                    @endforeach
                    <th scope="col">Score</th>
                </tr>
            </thead>
            <tbody>
                
                    <tr>
                        @foreach($students as $stud)
                        <th scope="row">{{ $stud->user->name . ' ' . $stud->user->lastname }}</th>
                        @endforeach
                        @foreach ($count as $c)
                            <td></td>
                        @endforeach
                        
                    </tr>

            </tbody>
    </ul>

@endsection