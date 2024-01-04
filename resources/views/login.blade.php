@extends('layout')

@section('title', 'Mentormap - Login')

@section('content')
    @include('includes/header')

    <section class="login d-block d-lg-flex align-items-center">
        <img src="{{ asset('images/login/login_bg.svg') }}" alt="" class="login__bg d-none d-lg-block">
        <div class="login__img">
            <img class="d-none d-lg-block" src="{{ asset('images/login/login.png') }}" alt="Pessoas sorridente com notebook">
            <img class="w-100 d-block d-lg-none" src="{{ asset('images/login/login_mobile.png') }}" alt="Pessoas sorridente com notebook">
        </div>
        <div class="login__form">
            <h1> Acessar sua conta </h1>
            <p> Insira os detalhes da sua conta abaixo para fazer login. </p>
            @if(session('success_register'))
                <div class="alert alert-success">
                    {{ session('success_register') }}
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{route('login.post')}}" method="POST">
                @csrf
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="mb-3">
                    <input class="form-control" type="text" name="email" placeholder="E-mail" required>
                    @error('email')
                        <p class="text-danger pt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="password" placeholder="Senha" required>
                    @error('password')
                        <p class="text-danger pt-2">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn login__submit mt-2"> Entrar </button>
            </form>
            <div class="pt-3 login__no-acount">
                Não possui uma conta ? <a href="{{route('cadastro')}}">Crie uma conta</a>
            </div>
            <div class="login__no-acount">
               Esqueceu sua senha ? <a href="{{route('recuperar-senha')}}">Resetar senha</a>
            </div>
        </div>
    </section>

    @include('includes/footer')
@endsection