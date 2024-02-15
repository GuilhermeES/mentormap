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
                            <div class="pergunta question" id="pergunta_{{$question->id}}">
                                <div>                
                                    <div class="d-flex justify-content-between align-items-center pb-3">
                                        <label for="question_{{ $question->id }}" class="fw-bold">Pergunta:</label>
                                        <button type="button" class="p-0 btn btn-deletar-pergunta" data-id="{{ $question->id }}"> 
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="pergunta-input form-control" name="question_{{ $question->id }}" value="{{ $question->title }}" required>
                                </div>
                        
                                <div class="respostas">
                                    @foreach($question->answers as $answer)
                                        <div class="answer pt-4 pb-2" id="resposta_{{$answer->id}}">
                                            <div class="w-100">
                                                <input type="text" class="resposta-input form-control form-control--ghost form-control--ghost-low" name="answer_{{ $answer->id }}" value="{{ $answer->text }}" required>
                                            </div>
                                            <div class="w-100">
                                                <input type="text" class="resposta-input form-control form-control--ghost form-control--ghost-low" name="score_{{ $answer->id }}" value="{{ $answer->score }}" required>
                                            </div>
                                            <button type="button" class="btn btn-deletar" data-id="{{ $answer->id }}">X</button>
                                        </div>                                   
                                    @endforeach
                                </div>
                                <button type="button" class="adicionarRespostaExistente btn button-dashboard button-dashboard--add-option" data-id="{{$question->id}}">
                                    Adicionar Resposta
                                    <i class="fa-solid fa-plus ms-3" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>

                    <input type="hidden" name="perguntas" id="perguntasInput">
                    <input type="hidden" name="respostas_novas" id="respostasInput">
    
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
        let inputElement = document.querySelector('.input-result-novos-valores');

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('adicionarPergunta').addEventListener('click', function() {
                adicionarPergunta();
            });

            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('adicionarResposta')) {
                    adicionarResposta(event.target.closest('.pergunta'));
                }

                if (event.target.classList.contains('adicionarRespostaExistente')) {
                    adicionarRespostaExistente(event.target.closest('.pergunta'));
                }

                if (event.target.classList.contains('removerPergunta')) {
                    removerPergunta(event.target.closest('.pergunta'));
                }

                if (event.target.classList.contains('removerResposta')) {
                    removerResposta(event.target.closest('.resposta'));
                }
            });
        });

        function adicionarPergunta() {
            let divPergunta = document.createElement('div');
            divPergunta.classList.add('pergunta');
            divPergunta.classList.add('question');
            divPergunta.classList.add('pergunta-novo');
            divPergunta.innerHTML = `
                <div class="d-flex justify-content-between align-items-center pb-3">
                    <div> Nova Pergunta </div>
                    <button type="button" class="removerPergunta btn p-0"> 
                        <i class="fa-solid fa-trash removerPergunta"></i>
                    </button>
                </div>
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
        }

        function adicionarResposta(perguntaElemento) {
            let divResposta = document.createElement('div');
            divResposta.classList.add('resposta');
            divResposta.innerHTML = `
                <div class="answer">
                    <div class="w-100"> <input type="text" class="resposta-input-novo form-control form-control--ghost form-control--ghost-low" placeholder="Resposta"> </div>
                    <div class="w-100"> <input type="number" class="pontuacao-input-novo form-control form-control--ghost form-control--ghost-low form-control--score"  placeholder="Pontuação"> </div>
                    <button type="button" class="removerResposta btn ">X</button>
                </div>
               
            `;
            perguntaElemento.querySelector('.respostas').appendChild(divResposta);
        }

        function adicionarRespostaExistente(perguntaElemento) {
            let respostas = []
            let perguntaId = event.target.dataset.id;

            let divResposta = document.createElement('div');
            divResposta.classList.add('resposta');
            divResposta.innerHTML = `
                <div class="answer">
                    <input type="text" data-id="${perguntaId}" class="resposta-input-novo-existente form-control form-control--ghost form-control--ghost-low" placeholder="Resposta">
                    <input type="number" data-id="${perguntaId}" class="pontuacao-input-novo-existente form-control form-control--ghost form-control--ghost-low form-control--score"  placeholder="Pontuação">
                    <button type="button" class="removerResposta btn ">X</button>
                </div>
               
            `;
            perguntaElemento.querySelector('.respostas').appendChild(divResposta);
        }

        function removerPergunta(perguntaElemento) {
            perguntaElemento.remove();
        }

        function removerResposta(respostaElemento) {
            respostaElemento.remove();
        }

        document.getElementById('customSubmitButton').addEventListener('click', function() {
            submitDados();
            submitDadosPerguntasNovas();
            document.getElementById('formUpdateTeste').submit();
        });

        function submitDados() {
            let perguntas = [];
    
            document.querySelectorAll('.pergunta-novo').forEach(function(perguntaElemento) {
                let pergunta = {
                    pergunta: perguntaElemento.querySelector('.pergunta-input-novo').value,
                    respostas: []
                };
    
                perguntaElemento.querySelectorAll('.resposta-input-novo').forEach(function(respostaElemento, index) {
                    let pontuacaoElemento = perguntaElemento.querySelectorAll('.pontuacao-input-novo')[index];
                    let resposta = {
                        resposta: respostaElemento.value,
                        pontuacao: pontuacaoElemento.value
                    };
                    pergunta.respostas.push(resposta);
                });
    
                perguntas.push(pergunta);
                
            });

            document.getElementById('perguntasInput').value = JSON.stringify(perguntas)
            
        }

        function submitDadosPerguntasNovas() {
            let respostaElemento = document.querySelectorAll('.resposta-input-novo-existente')

            let respostas = [];

            respostaElemento.forEach(function(respostaElemento, index) {

                let pontuacaoElemento = document.querySelectorAll('.pontuacao-input-novo-existente')[index];
                let resposta = {
                    idPergunta: respostaElemento.dataset.id,
                    resposta: respostaElemento.value,
                    pontuacao: pontuacaoElemento.value
                };
                respostas.push(resposta);
            });

            document.getElementById('respostasInput').value = JSON.stringify(respostas)

        }

        $('.btn-deletar').on('click', function () {
            let id = $(this).data('id');

            $.ajax({
                url: '/dashboard/resposta/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    console.log(response)
                    $("#"+response['resposta']).slideUp("slow");
                },
                error: function (error) {
                    console.error('Erro ao deletar o registro:', error);
                }
            });
        });

        $('.btn-deletar-pergunta').on('click', function () {
            let id = $(this).data('id');

            $.ajax({
                url: '/dashboard/pergunta/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    console.log(response)
                    $("#"+response['pergunta']).slideUp("slow");
                },
                error: function (error) {
                    console.error('Erro ao deletar o registro:', error);
                }
            });
        });
        
    </script>
@endsection