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
                <div class="titulo-descricao question">
                    <div class="teste-create__form">
                        <label for="title"> TÍTULO DO QUESTIONÁRIO </label>
                        <input type="text" name="title" id="title" class="title-quiz form-control  mb-4" placeholder="Digite o título" required>

                        <label for="description"> DESCRIÇÃO DO QUESTIONÁRIO </label>
                        <textarea name="description" id="description" class="description-quiz form-control " placeholder="Digite a descrição"></textarea>
                    </div>
                </div>
                <div id="formulario"></div>
                <div class="d-block d-md-flex align-items-center justify-content-between pt-0 pt-md-5 pb-4">
                    <button id="adicionarPergunta" class="button-dashboard button-dashboard--dashed">
                        Adicionar Pergunta
                        <i class="fa-solid fa-plus ms-3"></i>
                    </button>  
                    <button id="enviarFormulario" onclick="enviarDadosParaLaravel()" class="button-dashboard button-dashboard--finish mt-3 mt-md-0">Finalizar questionário</button>
                </div>
                <div class="info pt-3"></div>
            </div>
        </div>
    </div>

    <script>
        let index = 1;
        var urlTests = "{{ route('dashboard.gerenciar-testes') }}";

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('adicionarPergunta').addEventListener('click', function() {
                adicionarPergunta();
            });
    
            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('adicionarResposta')) {
                    adicionarResposta(event.target.closest('.pergunta'));
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

            var divPergunta = document.createElement('div');
            divPergunta.classList.add('pergunta');
            divPergunta.classList.add('question');
            divPergunta.innerHTML = `
                <div class="d-flex justify-content-between align-items-center pb-3">
                    <div class="fw-bold"> Nova Pergunta </div>
                    <button type="button" class="removerPergunta btn p-0"> 
                        <i class="removerPergunta fa-solid fa-trash"></i>
                    </button>
                </div>
                <input type="text" class="pergunta-input form-control" placeholder="Digite a pergunta">
                <div class="respostas  pt-4 pb-2">
                    <!-- As respostas serão adicionadas dinamicamente aqui -->
                </div>
                <button class="adicionarResposta btn button-dashboard button-dashboard--add-option">
                    Adicionar Resposta
                    <i class="fa-solid fa-plus ms-3"></i>
                </button>
            `;

            document.getElementById('formulario').appendChild(divPergunta);
            
            index++
        }
    
        function adicionarResposta(perguntaElemento) {
            var divResposta = document.createElement('div');
            divResposta.classList.add('resposta');
            divResposta.innerHTML = `
                <div class="answer">
                    <input type="text" class="resposta-input form-control form-control--ghost form-control--ghost-low" placeholder="Resposta">
                    <input type="number" class="pontuacao-input form-control form-control--ghost form-control--ghost-low form-control--score"  placeholder="Pontuação">
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
    
        function enviarDadosParaLaravel() {
            var perguntas = [];
    
            document.querySelectorAll('.pergunta').forEach(function(perguntaElemento) {
                var pergunta = {
                    pergunta: perguntaElemento.querySelector('.pergunta-input').value,
                    respostas: []
                };
    
                perguntaElemento.querySelectorAll('.resposta-input').forEach(function(respostaElemento, index) {
                    var pontuacaoElemento = perguntaElemento.querySelectorAll('.pontuacao-input')[index];
                    var resposta = {
                        resposta: respostaElemento.value,
                        pontuacao: pontuacaoElemento.value
                    };
                    pergunta.respostas.push(resposta);
                });
    
                perguntas.push(pergunta);
            });
    
            $.ajax({
                url: '/dashboard/gerenciar-testes/novo',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    perguntas: perguntas,
                    titulo: document.querySelector('.title-quiz').value,
                    descricao: document.querySelector('.description-quiz').value,
                },
                success: function(response) {
                    if (response.success) {
                        window.location.href = urlTests;
                    } else {
                        console.log(response);
                    }
                },
                error: function(error) {
                    console.log(error)
                    document.querySelector('.info').innerHTML = `
                        <div class="alert alert-danger">
                           Verifique os campos
                        </div>
                    `;
                }
                
            });
        }
    </script>
    
@endsection