<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/welcome">Welcome</a>
    @guest
        <a class="navbar-brand" href="{{ route('auth.index') }}">Login</a>
    @else
    
        <a class="navbar-brand" href="/">Home</a>
        @if(auth()->user()->role->id_role == 1)
            <a class="navbar-brand" href="{{ route('users.index') }}">Users</a>
        @endif
        @if(auth()->user()->role->id_role ?? 3)
            <a class="navbar-brand" href="{{ route('students.index') }}">Students</a>
            <a class="navbar-brand" href="{{ route('skills.index') }}">Skills</a>
        @endif
        <form style="display: inline" action="{{ route('auth.logout') }}" method="POST" name="logoutForm">
            @csrf
            <a class="navbar-brand" href="#" onclick="this.closest('form').submit()">Logout</a>
        </form>
    @endguest

    {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button> --}}
</nav>
