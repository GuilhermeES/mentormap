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
                    <h1 class="title title--white pb-2"> Gerenciar site </h1>
                </div>
                <img src="{{ asset('images/dashboard/gerenciar_interna.png') }}" alt="" class="d-none d-xl-block content__top--intern content__top--intern-img-bg">
            </div>
        
            <div class="content__body">
                
                <!--
                @foreach ($registros as $item)
                    {{ $item }}
                @endforeach
                
                <form method="post" action="{{ route('site.storeOrUpdate', $registro->id ?? null) }}">     
                    @csrf
                    <div class="gerenciar-list">
                        <div class="gerenciar p-4 mb-4">
                            <div class="gerenciar__section">Seção 01</div>
                            <div class="gerenciar__name">Banner</div>
                            <div class="row pt-4">
                                <div class="col-md-8">
                                    <div class="gerenciar__text">
                                        <input type="hidden" name="page" value="home">  
                                        <input type="hidden" name="section" value="banner">  
                                        <textarea class="gerenciar__textarea" name="text">  </textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="gerenciar__img">
                                        <input type="file" name="image" accept="image/png, image/jpeg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn gerenciar__submit"> Adicionar campo </button>
                    </div>
                </form>

                <hr class="mt-5">
                -->
            </div>
        </div>
    </div>
    
@endsection