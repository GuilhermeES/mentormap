@extends('layout')

@section('title', 'Dashboard')

@section('content')

    <div class="dashboard d-flex">

        @include('dashboard/includes/nav')
        @include('dashboard/includes/aside')
        
        <div class="content">
            <div class="content__top">
                <img src="{{ asset('images/dashboard/bg_dashboard.svg') }}" alt="" class="content__top-img">
                <div class="content__bg-text"></div>
                <div class="content__title-page">
                    <h1 class="title title--white pb-2">Bem vindo</h1>
                    <h3 class="user"> {{ auth()->user()->name }} </h3>
                </div>
            </div>
        
            <div class="content__body">
                <div class="content__body--links">
                    <div class="row">
                        @if( auth()->user()->admin )
                            <div class="col-md-6 mb-5">
                                <a href="{{ route('dashboard.gerenciar') }}" class="content__link">
                                    <img src="{{ asset('images/dashboard/gerenciar.svg') }}" alt="Homem segurando notebook">
                                    <div class="content__link-body ps-4 pe-4">
                                        <h3> Gerenciar site </h3>
                                        <p> Acessar </p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-5">
                                <a href="" class="content__link">
                                    <img src="{{ asset('images/dashboard/testes.svg') }}" alt="Mulher no notebook">
                                    <div class="content__link-body ps-4 pe-4">
                                        <h3> Gerenciar testes </h3>
                                        <p> Em breve </p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="" class="content__link">
                                    <img src="{{ asset('images/dashboard/usuarios.svg') }}" alt="Verificação de usuarios">
                                    <div class="content__link-body ps-4 pe-4">
                                        <h3> Usuários cadastrados </h3>
                                        <p> Em breve </p>
                                    </div>
                                </a>
                            </div>
                        @endif
                        <div class="col-md-6 mb-5">
                            <a href="" class="content__link">
                                <img src="{{ asset('images/dashboard/dados.svg') }}" alt="Informações para acessar dados">
                                <div class="content__link-body ps-4 pe-4">
                                    <h3> Meus dados </h3>
                                    <p> Em breve </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection