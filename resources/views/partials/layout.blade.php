<!DOCTYPE html>
<html>  
    <head> 
        <title>@yield('title', 'GestionUsuarios')</title>
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
        @include('partials.navbar')
    </head>
    <body>
        @yield('content')
    </body>
</html>