@extends('layout')

@section('title', 'Dashboard')

@section('content')

    <div class="dashboard d-flex">

        @include('dashboard/includes/nav')  
        @include('dashboard/includes/aside')

        <div class="teste-create content__body content content__body--user pt-4">
            <div class="col-md-10 mx-auto ">  
                <div class="teste-back">
                    <a href="{{ route('dashboard.gerenciar-testes')}}"> Voltar </a>
                </div>
                <form method="POST" action="{{ route('dashboard.update-teste', ['id' => $quiz->id]) }}">
                    @csrf
                    @method('POST')
                
                    <!-- Campos do quiz -->
                   <div class="titulo-descricao question">
                        <div class="teste-create__form">
                            <label for="title">TÍTULO DO QUESTIONÁRIO</label>
                            <input type="text" class="title-quiz form-control  mb-4" name="title" value="{{ $quiz->title }}">

                            <label for="description">DESCRIÇÃO DO QUESTIONÁRIO</label>
                            <textarea name="description" id="description" class="description-quiz form-control" placeholder="Digite a descrição">{{ $quiz->description }}</textarea>
                        </div>
                   </div>
                
                    <!-- Campos das perguntas e respostas -->
                    @foreach($quiz->questions as $question)
                       <div class="pergunta question">
                            <div>
                                <label class="pb-3" for="question_{{ $question->id }}">Pergunta {{ $question->id }}:</label>
                                <input type="text" class="pergunta-input form-control" name="question_{{ $question->id }}" value="{{ $question->title }}" required>
                            </div>
                    
                            @foreach($question->answers as $answer)
                                <div class="answer respostas  pt-4 pb-2">
                                    <input type="text" class="resposta-input form-control form-control--ghost form-control--ghost-low" name="answer_{{ $answer->id }}" value="{{ $answer->text }}" required>
                                    <input type="text" class="resposta-input form-control form-control--ghost form-control--ghost-low" name="score_{{ $answer->id }}" value="{{ $answer->score }}" required>
                                </div>
                            @endforeach
                       </div>
                    @endforeach
                
                    <!-- Botão de envio -->
                    <div class="text-end pt-0 pt-md-5 pb-4">
                        <button type="submit" class="button-dashboard button-dashboard--finish mt-3 mt-md-0">Atualizar Quiz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection