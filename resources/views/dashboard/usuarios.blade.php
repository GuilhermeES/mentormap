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
                    <h1 class="title title--white pb-2"> Usuários </h1>
                </div>
                <img src="{{ asset('images/dashboard/usuarios_interna.png') }}" alt="" class="d-none d-xl-block content__top--intern content__top--intern-img-bg">
            </div>
        
            <div class="content__body content__body--user mb-5 pb-4 user">
                <div class="user__filter row align-items-end justify-content-between mb-4">
                    <div class="col-md-6 pb-3 pb-md-0">
                        <div class="mb-2">Ordenar por:</div>
                        <div class="user__filter-buttons d-flex gap-3">
                            <button type="button" class="btn button-dashboard--filter button-dashboard"> Ordem alfabética </button>
                            <button type="button" class="btn button-dashboard--filter button-dashboard"> Data de inscrição </button>
                        </div>
                    </div>
                    <div class="user__search col-md-5">
                        <input type="text" class="form-control" placeholder="Pesquisar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="10" cy="10" r="6" stroke="#342B77" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.5 14.5L19 19" stroke="#342B77" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <ul class="user__list">
                    <li class="p-4 mb-3 d-block d-md-flex align-items-center justify-content-between">
                        <div class="user__list mb-3 mb-md-0">
                            <h3> Nome do usuario </h3>
                            <div class="user__cargo">Cargo</div>
                        </div>
                        <div class="user__info">
                            <a href="" class="btn button-dashboard"> Visualizar perfil </a>
                        </div>
                    </li>
                    <li class="p-4 mb-3 d-flex align-items-center justify-content-between">
                        <div class="user__list">
                            <h3> Nome do usuario </h3>
                            <div class="user__cargo">Cargo</div>
                        </div>
                        <div class="user__info">
                            <a href="" class="btn button-dashboard"> Visualizar perfil </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
@endsection