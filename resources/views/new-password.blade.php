@extends('layout')

@section('content')
    @include('includes/header')

    <section class="login d-block d-lg-flex align-items-center">
        <img src="{{ asset('images/login/login_bg.svg') }}" alt="" class="login__bg d-none d-lg-block">
        <div class="login__img">
            <img class="d-none d-lg-block" src="{{ asset('images/login/login.png') }}" alt="Pessoas sorridente com notebook">
            <img class="w-100 d-block d-lg-none" src="{{ asset('images/login/login_mobile.png') }}" alt="Pessoas sorridente com notebook">
        </div>
        <div class="login__form">
            <h1> Resetar senha </h1>
            <p> Enviamos um link para seu e-mail, use esse link para redefinir a senha.</p>
            @if(session('success_register'))
                <div class="alert alert-success">
                    {{ session('success_register') }}
                </div>
            @endif
            <form action="{{route('reset-password.post')}}" method="POST">
                @csrf
                @if($errors->any())
                    <div class="alert alert-danger">
                        <div>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                @endif
                <input class="form-control" name="token" type="hidden" value={{$token}}>
                <div class="mb-3">
                    <input class="form-control" type="text" name="email" placeholder="E-mail" required>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="password" placeholder="Nova senha" required>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirme a nova senha" required>
                </div>
                <button type="submit" class="btn login__submit mt-2"> Enviar </button>
            </form>
        </div>
    </section>

    @include('includes/footer')
@endsection