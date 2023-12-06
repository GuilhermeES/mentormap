<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />
        @vite(['resources/scss/app.scss'])
        <title>Mentormap</title>
    </head>

    <body>
        <header class="header">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('images/logo_header.png') }}" alt="Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="18" viewBox="0 0 26 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.0476074 1C0.0476074 0.447715 0.495323 0 1.04761 0H24.0476C24.5999 0 25.0476 0.447715 25.0476 1C25.0476 1.55228 24.5999 2 24.0476 2H1.04761C0.495323 2 0.0476074 1.55228 0.0476074 1ZM6.04761 9C6.04761 8.44772 6.49532 8 7.04761 8L24.0476 8C24.5999 8 25.0476 8.44771 25.0476 9C25.0476 9.55228 24.5999 10 24.0476 10L7.04761 10C6.49532 10 6.04761 9.55229 6.04761 9ZM1.04761 16C0.495323 16 0.0476074 16.4477 0.0476074 17C0.0476074 17.5523 0.495323 18 1.04761 18H24.0476C24.5999 18 25.0476 17.5523 25.0476 17C25.0476 16.4477 24.5999 16 24.0476 16H1.04761Z" fill="#0E1B4A"/>
                        </svg>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end me-5 pe-3" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item header__item">
                                <a class="nav-link header__link" href="#banner">Início</a>
                            </li>
                            <li class="nav-item header__item">
                                <a class="nav-link header__link" href="#plataforma">Nossa plataforma</a>
                            </li>
                            <li class="nav-item header__item">
                                <a class="nav-link header__link" href="#contato">Contato</a>
                            </li>
                            <div class="d-block d-lg-none gap-4">
                                <a href="/login" class="btn header__btn header__btn--ghost me-3">
                                    Login
                                </a>
                                <a href="/cadastro" class="btn header__btn header__btn--normal">
                                    Cadastro
                                </a>
                            </div>
                        </ul>
                    </div>
                    <div class="d-none d-lg-flex gap-4">
                        <a href="/login" class="btn header__btn header__btn--ghost">
                            Login
                        </a>
                        <a href="/cadastro" class="btn header__btn header__btn--normal">
                            Cadastro
                        </a>
                    </div>
                </div>
            </nav>
        </header>
    </body>
    
</html>
