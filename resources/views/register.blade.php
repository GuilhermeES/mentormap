@extends('layout')

@section('title', 'Mentormap - Cadastro')

@section('content')
    @include('includes/header')

    <section class="login d-block d-lg-flex align-items-center">
        <img src="{{ asset('images/login/login_bg.svg') }}" alt="" class="login__bg d-none d-lg-block">
        <div class="login__img">
            <img class="d-none d-lg-block" src="{{ asset('images/login/registro.png') }}" alt="Pessoas sorridente com notebook">
            <img class="w-100 d-block d-lg-none" src="{{ asset('images/login/registro_mobile.png') }}" alt="Pessoas sorridente com notebook">
        </div>
        <div class="login__form">
            <h1> Crie sua conta </h1>
            <p> Precisamos de algumas informações para criar sua conta. </p>
            <form action="{{route('cadastro.user')}}" method="POST" id="registrationForm">
                @csrf
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="mb-3">
                    <input class="form-control" type="text" name="name" placeholder="Nome completo" value="{{ old('name') }}" required>
                    @error('nome')
                        <p class="text-danger pt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input class="form-control" type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-danger pt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 d-flex gap-4">
                    <div class="w-100">
                        <input class="form-control" type="text" name="data_nascimento" id="dataNascimento" value="" 
                        placeholder="Data de nascimento" required>
                        @error('data_nascimento')
                            <p class="text-danger pt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-100">
                        <select class="form-select" name="sexo" aria-label="Gênero">
                            <option selected>Gênero</option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                            <option value="outro">Outro</option>
                            <option value="prefiro_nao_dizer">Prefiro não dizer</option>
                          </select>
                        @error('sexo')
                            <p class="text-danger pt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="cargo" placeholder="Cargo profissional" value="{{ old('cargo') }}" required>
                    @error('cargo')
                        <p class="text-danger pt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="password" placeholder="Senha" required>
                    @error('password')
                        <p class="text-danger pt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirme senha"  required>
                </div>
                <button type="submit" disabled class="btn login__submit  mt-2"> Criar conta </button>
            </form>
            <div class="pt-3 login__no-acount">
                Já possui uma conta ? <a href="{{route('login')}}">Login</a>
            </div>
        </div>
    </section>

    @include('includes/footer')
@endsection