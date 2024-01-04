@extends('layout')

@section('title', 'Dashboard')

@section('content')

    <div class="dashboard d-flex">

        @include('dashboard/includes/nav')  
        @include('dashboard/includes/aside')

        <div class="teste-create content__body content content__body--user pt-4">
            <div class="col-md-10 mx-auto ">  
                <div class="teste-back">
                    <a href="{{ route('dashboard.testes')}}"> Voltar </a>
                </div>
                <div class="quest-all">
                   @if(!session('error'))
                        {!! $resultado->content !!}
                    @endif
                   @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection