@extends('layout')

@section('title', 'Dashboard')

@section('content')

    <div class="dashboard d-flex">

        @include('dashboard/includes/nav')  
        @include('dashboard/includes/aside')

        <div class="teste-create content__body content content__body--user pt-4">
            <div class="col-md-10 mx-auto ">  
                <div class="col-md-10 mx-auto ">  
                    <div class="teste-back">
                        <a href="{{ route('dashboard.gerenciar-resultados')}}"> Voltar </a>
                    </div>
                    <div class="titulo-descricao question">
                    <form action="{{route('dashboard.salvar-resultado')}}" method="POST">
                        @csrf
                        <div class="teste-create__form">
                            <label for="title"> TÍTULO * </label>
                            <input type="text" name="title" id="title" class="title-quiz form-control  mb-4" placeholder="Digite o título" required>
    
                            <label for="score"> PONTUAÇÃO * </label>
                            <input type="number" name="score" id="score"  class="title-quiz form-control" placeholder="Digite a pontuação desse resultado" required>

                            <label for="content" class="mt-4"> CONTEÚDO * </label>
                            <textarea name="content" id="content"></textarea>
                        </div>
                        <div class="text-end pt-0 pt-md-5 pb-4"> 
                            <button type="submit" class="button-dashboard button-dashboard--finish mt-3 mt-md-0">Finalizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        tinymce.init({
        selector : "textarea",
        content_css: 'writer',
        theme: "silver",
        width:  '100%',
        plugins: [ 'table powerpaste',
                   'lists media',
                   'paste' ],
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify',
        })
      </script>
    
@endsection