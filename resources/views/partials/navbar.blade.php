<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/welcome">Welcome</a>
    <a class="navbar-brand" href="/">Home</a>

    
    @guest
        <a class="navbar-brand" href="{{ route('auth.index') }}">Login</a>
    @else
        
        @if(auth()->user()->role->id_role == 1)
            <a class="navbar-brand" href="{{ route('users.index') }}">Users</a>
        @endif
        @if(auth()->user()->role->id_role != 3)
            <a class="navbar-brand" href="{{ route('students.index') }}">Students</a>
            <a class="navbar-brand" href="{{ route('skills.index') }}">Skills</a>
            <a class="navbar-brand" href="{{ route('skill_qual_stud.index')}}">Register Scores</a>
        @endif
        <form style="display: inline" action="{{ route('auth.logout') }}" method="POST" name="logoutForm">
            @csrf
            <a class="navbar-brand" href="#" onclick="this.closest('form').submit()">Logout</a>
        </form>
        <a class="navbar-brand" href="/">{{auth()->user()->email}}</a>
    @endguest

    {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button> --}}
</nav>
