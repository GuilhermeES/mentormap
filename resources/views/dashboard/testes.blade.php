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
                    <h1 class="title title--white pb-2"> Testes </h1>
                </div>
                <img src="{{ asset('images/dashboard/gerenciar-teste_interna.png') }}" alt="" class="d-none d-xl-block content__top--intern content__top--intern-img-bg">
            </div>
        
            <div class="content__body content__body--user mb-5 pb-4 user">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                 @endif
                 <div class="user__filter row align-items-end justify-content-between mb-4">
                    <div class="col-md-6 pb-3 pb-md-0">
                        <a href="{{ route('dashboard.resultados') }}" class="btn button-dashboard--new-test">
                            Ver meus resultados
                            <i class="fa-solid fa-arrow-right-long ms-2"></i>
                        </a>
                    </div>
                </div>
                 <ul class="user__list quiz__list">
                    @foreach ($quizzes as $quiz)
                    <li class="p-4 mb-3 row">
                        <div class="col-md-4">
                            <div class="quiz__title mb-3 mb-md-0">
                                <h3> {{ $quiz->title }} </h3>
                            </div>
                        </div>
                        <div class="col-md-4 text-start text-md-center pb-4 pb-md-0 ">
                            <div class="quiz__date">
                                Publicado
                            </div>
                            <div class="quiz__date-format">
                                {{ \Carbon\Carbon::parse($quiz->created_at)->format('d/m/Y') }}
                            </div>
                        </div>
                        <div class="col-md-4 text-start text-md-end">
                            <div class="quiz__btn">
                                <a href="{{ route('dashboard.realizar-testes', ['id' => $quiz->id]) }}">
                                    <button class="btn button-dashboard button-dashboard--start"> Responder </button>
                                </a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                
                <div class="navigation">
                    {{ $quizzes->appends(['search' => request()->get('search', '')])->links() }}
                </div>
                <div class="user__total">
                    Total de <strong>{{ $quizzes->total() }}</strong> questionários encontrados
               </div>
             
            </div>
          
    </div>
    
@endsection