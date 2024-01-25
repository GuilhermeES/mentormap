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
                <form id="formUpdateTeste" method="POST" action="{{ route('dashboard.update-teste', ['id' => $quiz->id]) }}">
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
                    <div id="perguntas-container">
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
                    </div>

                    <input type="hidden" name="perguntas" id="perguntasInput">
    
                    <!-- Botão de envio -->
                    <div class="d-block d-md-flex align-items-center justify-content-between pt-0 pt-md-5 pb-4">
                        <button type="button" id="adicionarPergunta" class="button-dashboard button-dashboard--dashed">
                            Adicionar Pergunta
                            <i class="fa-solid fa-plus ms-3"></i>
                        </button> 
                        <button id="customSubmitButton" class="button-dashboard button-dashboard--finish mt-3 mt-md-0">Atualizar Quiz</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        let index = 1;
        var inputElement = document.querySelector('.input-result-novos-valores');

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('adicionarPergunta').addEventListener('click', function() {
                adicionarPergunta();
            });
    
            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('adicionarResposta')) {
                    adicionarResposta(event.target.closest('.pergunta'));
                }
            });
        });
    
        function adicionarPergunta() {

            var divPergunta = document.createElement('div');
            divPergunta.classList.add('pergunta');
            divPergunta.classList.add('question');
            divPergunta.classList.add('pergunta-novo');
            divPergunta.innerHTML = `
                <div class="pb-3"> Nova Pergunta </div>
                <input type="text" class="pergunta-input-novo form-control" placeholder="Digite a pergunta">
                <div class="respostas  pt-4 pb-2">
                    <!-- As respostas serão adicionadas dinamicamente aqui -->
                </div>
                <button type="button" class="adicionarResposta btn button-dashboard button-dashboard--add-option">
                    Adicionar Resposta
                    <i class="fa-solid fa-plus ms-3"></i>
                </button>
            `;

            document.getElementById('perguntas-container').appendChild(divPergunta);
            
            index++
        }
    
        function adicionarResposta(perguntaElemento) {
            var divResposta = document.createElement('div');
            divResposta.innerHTML = `
                <div class="answer">
                    <input type="text" class="resposta-input-novo form-control form-control--ghost form-control--ghost-low" placeholder="Resposta">
                    <input type="number" class="pontuacao-input-novo form-control form-control--ghost form-control--ghost-low form-control--score"  placeholder="Pontuação">
                </div>
            `;
            perguntaElemento.querySelector('.respostas').appendChild(divResposta);
        }

        document.getElementById('customSubmitButton').addEventListener('click', function() {
            enviarDadosParaLaravel();

            document.getElementById('formUpdateTeste').submit();
        });
    
        function enviarDadosParaLaravel() {
            var perguntas = [];
    
            document.querySelectorAll('.pergunta-novo').forEach(function(perguntaElemento) {
                var pergunta = {
                    pergunta: perguntaElemento.querySelector('.pergunta-input-novo').value,
                    respostas: []
                };
    
                perguntaElemento.querySelectorAll('.resposta-input-novo').forEach(function(respostaElemento, index) {
                    var pontuacaoElemento = perguntaElemento.querySelectorAll('.pontuacao-input-novo')[index];
                    var resposta = {
                        resposta: respostaElemento.value,
                        pontuacao: pontuacaoElemento.value
                    };
                    pergunta.respostas.push(resposta);
                });
    
                perguntas.push(pergunta);
                
            });
            document.getElementById('perguntasInput').value = JSON.stringify(perguntas)
            
        }
        
    </script>
@endsection