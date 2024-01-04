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
                    <h1 class="title title--white pb-2"> Meus resultados </h1>
                </div>
                <img src="{{ asset('images/dashboard/gerenciar-teste_interna.png') }}" alt="" class="d-none d-xl-block content__top--intern content__top--intern-img-bg">
            </div>
        
            <div class="content__body content__body--user mb-5 pb-4 user">
                <ul class="user__list quiz__list quiz__list--result">
                    @foreach($userQuizzes as $userQuiz)
                        <li class="p-4 mb-3 row">
                            <div class="col-md-4">
                                <div class="quiz__date">
                                    Teste nome:
                                </div>
                                <div class="quiz__title mb-3 mb-md-0">
                                    <h3> {{ $userQuiz->quiz->title  }} </h3>
                                </div>
                            </div>
                            <div class="col-md-2 text-center">
                                <div class="quiz__date">
                                    Respondido em:
                                </div>
                                <div class="quiz__date-format">
                                    {{ \Carbon\Carbon::parse($userQuiz->created_at)->format('d/m/Y') }}
                                </div>
                            </div>
                            @if(!empty($userQuiz->result))
                                <div class="col-md-6 text-end d-flex align-items-center gap-3 justify-content-end">
                                    <div class="quiz__btn">
                                        <a href="#">
                                            <button href="" class="w-100 btn button-dashboard button-dashboard--start" 
                                            data-bs-toggle="modal" data-bs-target="#modal-{{$userQuiz->id}}"> Ver resultado </button>
                                        </a>
                                    </div>
                                </div>
                                @include('dashboard/includes/modal-resultados', ['userQuiz' => $userQuiz])
                            @endif
                        </li>
                    @endforeach
                </ul>
                <div class="navigation">
                    {{ $userQuizzes->appends(['search' => request()->get('search', '')])->links() }}
                </div>
                <div class="user__total">
                    Total de <strong>{{ $userQuizzes->total() }}</strong> questionários respondidos encontrados
               </div>
            </div>
    </div>
    
@endsection