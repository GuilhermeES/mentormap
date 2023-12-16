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
        
            <div class="content__body mb-5 pb-4 gerenciar__top">
                
                @if(session('success'))
                    <div class="alert alert-success ">
                        {{ session('success') }}
                    </div>
                @endif

                @foreach ($registros as $item)
                    <form method="post" action="{{ route('site.storeOrUpdate', $item->id ?? null) }}" enctype="multipart/form-data">     
                        @csrf
                        <div class="gerenciar-list">
                            <div class="gerenciar p-4 mb-4">
                                <div class="gerenciar__section">Seção {{ $item->id }}</div>
                                <div class="gerenciar__name"> {{ $item->section }} </div>
                                <div class="row pt-4 ">
                                    <div class="{{ $item->id != 4 ? 'col-md-7' : 'col-md-12' }}">
                                        <div class="gerenciar__text">
                                            <input type="text" class="form-control mb-3" name="text" value="{{ $item->text }}">
                                            <textarea class="gerenciar__textarea" name="subtitle">{{ $item->subtitle }}</textarea>
                                            <img src="{{ asset('images/edit.svg') }}" alt="">
                                        </div>
                                    </div>
                                    @if($item->id != 4 )
                                        <div class="col-md-5">
                                            <div class="gerenciar__img p-4">
                                                <div class="gerenciar__input pb-4">                                               
                                                    <label for="image">
                                                        <input  class="gerenciar__input-file" type="file" id="image" name="image" accept="image/png, image/jpeg" />
                                                    </label>                                           
                                                </div>
                                                @if($item->image)
                                                    <img src="{{ asset('images/' . $item->image) }}" alt="Imagem" class="imagem-preview">
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="text-center text-md-end pt-4">
                                    <button type="submit" class="btn button-dashboard"> Salvar alterações </button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
    
@endsection