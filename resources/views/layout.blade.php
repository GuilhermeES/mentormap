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
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="https://cdn.tiny.cloud/1/1h6ds99kmoqoc6k83e0s4hcoxlgdcb4invz616x5evgldp2j/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        @endif

        @vite(['resources/scss/app.scss'])
        
        <title>@yield('title', 'Mentormap')</title>
        <meta name="description" content="@yield('description', 'Revolucione sua carreira com o Mentor Map: orientação personalizada, mentorias especializadas e recursos educacionais para uma jornada única.')">
        <meta name="keywords" content="">
        <meta name="robots" content="">
        <meta name="revisit-after" content="1 day">
        <meta name="language" content="Portuguese">
        <meta name="generator" content="N/A">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta property="og:title" content="Mentormap" />
        <meta property="og:image" content="{{ asset('images/banner.png') }}" />

        <meta name="csrf-token" content="{{ csrf_token() }}">
        

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
        
        @if(request()->is('cadastro'))
            <script src="{{ asset('js/register.js') }}"></script>
        @endif


    </body>
</html>
