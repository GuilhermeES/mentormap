@extends('layout')

@section('title', 'Dashboard')

@section('content')

    <div class="dashboard d-flex">

        @include('dashboard/includes/nav')
        @include('dashboard/includes/aside')

        <div class="content">
            <div class="content__top content__top--intern">
                <img src="{{ asset('images/dashboard/bg_internas.svg') }}" alt="" class="content__top-img content__top--intern-img">
                <div class="content__bg-text"></div>
                <div class="content__title-page content__top--intern-title-page">
                    <h1 class="title title--white pb-2"> {{ auth()->user()->name }} </h1>
                    <h3 class="user-name"> {{$user->cargo}} </h3>
                </div>
                <img src="{{ asset('images/dashboard/dados_interna.png') }}" alt="" class="d-none d-xl-block content__top--intern content__top--intern-img-bg">
            </div>
        
            <div class="content__body content__body--user mb-5 pb-4 user">
                <div class="col-md-9 mx-auto">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif  
                    <div class="perfil__bg p-4 p-md-5">
                        <form method="post" action="{{ route('dashboard.dados') }}"> 
                            @csrf
                            <div class="mb-2">
                                <label for="name" class="form-label form-label--ghost">Nome de usuário:</label>
                                <input type="text" class="form-control form-control--ghost" id="name" name="name" value="{{$user->name}}" required>
                            </div>
                            <div class="mb-2 pt-3">
                                <label for="email" class="form-label form-label--ghost">E-mail:</label>
                                <input type="text" class="form-control form-control--ghost" id="email" name="email" value="{{$user->email}}" required disabled>
                            </div>
                            <div class="mb-3 pt-3">
                                <label for="cargo" class="form-label form-label--ghost">Cargo:</label>
                                <input type="text" class="form-control form-control--ghost" id="cargo" name="cargo" value="{{$user->cargo}}" required>
                            </div>
                            <div class="mb-3 pt-3">
                                <label for="trajetoria" class="form-label form-label--ghost">Trajetória profissional:</label>
                                <textarea type="text" class="form-control form-control--ghost" name="trajetoria_profissional" id="trajetoria">{{$user->trajetoria_profissional}}</textarea>
                            </div>
                            <div class="mb-3 pt-3">
                                <button type="submit" class="btn button-dashboard">Salvar</button>
                            </div>
                        </form>
                        <form class="pt-5 mt-3" method="post" action="{{ route('dashboard.senha') }}">
                            @csrf
                            <div class="mb-2">
                                <label for="senha-atual" class="form-label form-label--ghost">Senha atual</label>
                                <input type="password" class="form-control form-control--ghost" name="senhaAtual" id="senha-atual" required>
                            </div>
                            <div class="mb-2 pt-3">
                                <label for="nova-senha" class="form-label form-label--ghost">Nova senha</label>
                                <input type="password" class="form-control form-control--ghost" name="novaSenha" id="nova-senha" required>
                            </div>
                            <div class="mb-3 pt-3">
                                <button type="submit" class="btn button-dashboard">Salvar nova senha</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    
@endsection