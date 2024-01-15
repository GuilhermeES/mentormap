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
                    <h1 class="title title--white pb-2"> Resultados </h1>
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
                        <a href="{{ route('dashboard.novo-resultado') }}" class="btn button-dashboard--new-test">
                            <i class="fa-solid fa-plus me-2"></i>
                            Criar resultado
                        </a>
                    </div>
                </div>
                <ul class="user__list quiz__list">
                    @foreach ($results as $result)
                        <li class="p-4 mb-3 row align-items-center">
                            <div class="col-md-4">
                                <div class="quiz__title mb-3 mb-md-0">
                                    <h3> {{ $result->title }} </h3>
                                </div>
                            </div>
                            <div class="col-md-4 text-start text-md-center pb-4 pb-md-0">
                                <div class="quiz__date">
                                    Publicado
                                </div>
                                <div class="quiz__date-format">
                                    {{ \Carbon\Carbon::parse($result->created_at)->format('d/m/Y') }}
                                </div>
                            </div>
                            <div class="col-md-4 text-end d-flex align-items-center justify-content-start justify-content-md-end gap-3">
                                <div class="quiz__btn">
                                    <a href="{{ route('dashboard.editar-resultado', ['id' => $result->id]) }}">
                                        <button class="btn button-dashboard button-dashboard--edit"> Editar </button>
                                    </a>
                                </div>
                                <div class="quiz__btn">                                  
                                    <button class="btn excluir-botao"  data-id="{{ $result->id }}"> 
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="navigation">
                    {{ $results->appends(['search' => request()->get('search', '')])->links() }}
                </div>
                <div class="user__total">
                    Total de <strong>{{ $results->total() }}</strong> resultados encontrados
               </div>
            </div>
        </div>

        <script>
            $('.excluir-botao').on('click', function () {
                let id = $(this).data('id');
                let confirmacao = confirm('Tem certeza que deseja excluir este recurso?');
    
                if (confirmacao) {
                    $.ajax({
                        url: '/dashboard/gerenciar-resultados/' + id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (data) {
                            window.location.reload()
                        },
                        error: function (data) {
                            console.log('Erro ao excluir recurso.');
                        }
                    });
                }
            });
        </script>
    
@endsection