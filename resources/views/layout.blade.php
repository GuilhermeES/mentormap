<!DOCTYPE html>
<html lang="pt-BR">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

        @if(request()->is('/'))
            <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />
        @endif

        @if(request()->is('dashboard*'))
            <script src="https://kit.fontawesome.com/b4a5f4472e.js" crossorigin="anonymous"></script>
        @endif

        @vite(['resources/scss/app.scss'])
        
        <title>@yield('title', 'Mentormap')</title>

    </head>
    <body>

        <main>
            @yield('content')
        </main>

        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        @if(request()->is('dashboard*'))
            <script src="{{ asset('js/dashboard.js') }}"></script>
        @endif

        @if(request()->is('/'))
            <script src="{{ asset('js/home.js') }}"></script>
            <script src="{{ asset('js/aos.js') }}"></script>
            <script>
            AOS.init();
            </script>
        @endif
        
    </body>
</html>
