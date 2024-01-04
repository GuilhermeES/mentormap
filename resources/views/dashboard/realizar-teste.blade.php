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

               <div class="d-flex align-items-center gap-2 mt-5">
                    <img src="{{ asset('images/mentormap_icon.svg') }}" alt="">
                    <div id="progresso" class="progresso">
                        <div id="barraProgresso" class="barra-progresso"></div>
                    </div>
               </div>

                <div class="quest-all">
                    <form method="POST" action="{{ route('dashboard.salvar-respostas') }}">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                        @foreach($quiz->questions as $key => $question)
                            <div class="quest" id="quest_{{ $key }}" style="display: {{ $key === 0 ? 'block' : 'none' }}">
                                <div class="quest__top">
                                    PERGUNTA
                                </div>
                                <div class="quest__title pt-2">
                                    {{ $question->title }}
                                </div>
                                <div class="quest__answers mt-5">
                                    @foreach($question->answers as $answer)
                                        <div class="answer respostas">
                                            <input class="form-check-input" type="radio" name="answer[{{ $key }}][answer_id]" id="{{ $answer->id }}" value="{{ $answer->id }}">
                                            <label class="form-check-label" for="{{ $answer->id }}">
                                                {{ $answer->text }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-between pt-5">
                            <button type="button" id="anteriorBtn" class="button-dashboard button-dashboard--dashed" style="visibility: hidden;">Anterior</button>
                            <button type="button" id="proximoBtn" class="btn button-dashboard button-dashboard ">Próximo</button>
                            <button type="submit" id="btnFinalizar" class="btn button-dashboard button-dashboard btn-finish" style="display: none;">Finalizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
    let currentQuestion = 0;
    const totalQuestions = {{ count($quiz->questions) }};
    const questDivs = document.querySelectorAll('.quest');
    const proximoBtn = document.getElementById('proximoBtn');
    const anteriorBtn = document.getElementById('anteriorBtn');
    const barraProgresso = document.getElementById('barraProgresso');
    const btnFinalizar = document.getElementById('btnFinalizar');

    proximoBtn.addEventListener('click', function () {
        if (currentQuestion < totalQuestions - 1) {
            questDivs[currentQuestion].style.display = 'none';

            currentQuestion++;

            questDivs[currentQuestion].style.display = 'block';

            const progresso = (currentQuestion + 1) / totalQuestions * 100;
            barraProgresso.style.width = progresso + '%';

            anteriorBtn.style.visibility = 'unset';
        }

        if (currentQuestion === totalQuestions - 1) {
            proximoBtn.style.display = 'none';
            btnFinalizar.style.display = 'block';
        }
    });

    anteriorBtn.addEventListener('click', function () {
        if (currentQuestion > 0) {
            questDivs[currentQuestion].style.display = 'none';

            currentQuestion--;

            questDivs[currentQuestion].style.display = 'block';

            const progresso = currentQuestion / totalQuestions * 100;
            barraProgresso.style.width = progresso + '%';

            proximoBtn.style.display = 'block';
            btnFinalizar.style.display = 'none';
        }

        if (currentQuestion === 0) {
            anteriorBtn.style.visibility = 'hidden';
        }
    });
});

    </script>

@endsection