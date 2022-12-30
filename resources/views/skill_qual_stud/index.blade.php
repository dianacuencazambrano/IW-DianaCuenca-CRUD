@extends('partials.layout')

@section('title', 'Register Scores')

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Students List</h1>
            </div>
            <div class="col">
                <form id="publish-reinforcements" method="POST" action="{{ route('skill_rein_stud.publish') }}">
                    @csrf @method('PATCH')

                </form>
                <a href="#" onclick="document.getElementById('publish-reinforcements').submit()"class="btn btn-info">Publish Reinforcements</a href="">
            </div>
        </div>
        <ul>
            <table class="table table-bordered data-table">
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
                                        <td><a href="" data-name="id_qual" class="update" data-type="text" data-pk="{{ $score->id }}"
                                            data-title="Enter the score">
                                            {{ $score->qual->scale_qual ?? 'NE' }}
                                        </a></td>
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
    <script type="text/javascript">
        $.fn.editable.defaults.mode = 'inline';
      
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        }); 
      
        $('.update').editable({
               url: "{{ route('skill_qual_stud.update') }}",
               type: 'text',
               pk: 1,
               name: 'name',
               title: 'Enter Score'
        });
    </script>
@endsection


