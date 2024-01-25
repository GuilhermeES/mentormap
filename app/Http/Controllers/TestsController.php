<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\UserQuiz;

class TestsController extends Controller
{
    public function create () {
        return view('dashboard.novo-teste');
    }

    public function indexResultado () {
        $results = Result::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.gerenciar-resultados',compact('results'));
    }

    public function indexResultados () {
        $userId = Auth::id();
        $userQuizzes = UserQuiz::orderBy('created_at', 'desc')->where('user_id', $userId)->paginate(10);
        return view('dashboard.resultados', compact('userQuizzes'));
    }

    public function createResultadoScreen () {
        return view('dashboard.novo-resultado');
    }

    public function resultadoScreen () {
        return view('dashboard.resultado');
    }

    public function editResultado($id)
    {
        $result = Result::find($id);

        return view('dashboard.editar-resultados', compact('result'));
    }

    public function createResultado (Request $request) {
        $data = $request->all();

        Result::create($data);

        return redirect()->route('dashboard.gerenciar-resultados')->with('success', 'Resultado cadastrado com sucesso');
    }
    
    public function index () {
        
        $quizzes = Quiz::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.gerenciar-testes',compact('quizzes'));
    
    }

    public function indexUser () {
        
        $quizzes = Quiz::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.testes',compact('quizzes'));
        

    }
    
    public function realizarTest($id)
    {
        $quiz = Quiz::with('questions.answers')->find($id);

        return view('dashboard.realizar-teste', compact('quiz'));
    }

    public function salvarRespostas(Request $request){

        $answerIDS = [];
        $scores = [];

        $respostas = $request->input('answer');
        $quizId = $request->input('quiz_id');

        foreach($respostas as $resposta) {
            array_push($answerIDS, $resposta["answer_id"]);
        }

        $resultados = Answer::whereIn('id', $answerIDS)->pluck('score', 'id');

        foreach ($resultados as $id => $score) {
            array_push($scores, $score);
        }

        $somaScore = array_sum($scores);

        $scores = Result::pluck('score');

        foreach ($scores as $score) {

            if($somaScore == $score) {

                $getResultado = Result::where('score', $somaScore)->first();

                UserQuiz::create([
                    'user_id' => Auth::id(),
                    'quiz_id' => $quizId,
                    'score' => $somaScore,
                    'result_id' => $getResultado->id
                ]);
              
                return view('dashboard.resultado', ['resultado' => $getResultado]);
                
            }
        }

        return redirect()->route('dashboard.resultado')->with('error', 'Nenhum resultado cadastrado para suas respostas, tente novamente, ou entre em contato');

    }

    public function edit($id)
    {
        $quiz = Quiz::with('questions.answers')->find($id);

        return view('dashboard.editar-testes', compact('quiz'));
    }

    public function update($id, Request $request)
    {
        $quiz = Quiz::with('questions.answers')->find($id);

        if ($request->has('perguntas') && !empty($request->input('perguntas'))) {

            $jsonPerguntas = $request->input('perguntas');
            $perguntas = json_decode($jsonPerguntas, true);

            if ($perguntas !== null) {
  
                foreach ($perguntas as $pergunta) {

                    $question = Question::create([
                        'quiz_id' => $quiz->id,
                        'title' => $pergunta["pergunta"],
                    ]);
        
                    foreach ($pergunta['respostas'] as $dadoResposta) {
        
                        Answer::create([
                            'question_id' => $question->id,
                            'text' => $dadoResposta["resposta"],
                            'score' => $dadoResposta["pontuacao"],
                        ]);
                    }
                }
            }
        }

        $quiz->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        foreach ($quiz->questions as $question) {
            $question->update([
                'title' => $request->input('question_' . $question->id),
            ]);

            foreach ($question->answers as $answer) {
                $answer->update([
                    'text' => $request->input('answer_' . $answer->id),
                    'score' => $request->input('score_' . $answer->id),
                ]);
            }
        }

        return redirect()->route('dashboard.gerenciar-testes')->with('success', 'Questionário atualizado com sucesso');
    }

    public function deleteTeste($id, Request $request){
        $quiz = Quiz::find($id);

        if ($quiz) {
            $quiz->delete();

            return response()->json(['mensagem' => 'Recurso excluído com sucesso']);
        } else {
            return response()->json(['mensagem' => 'Recurso não encontrado'], 404);
        }
    }

    public function deleteResult($id, Request $request){
        $result = Result::find($id);

        if ($result) {
            $result->delete();

            return response()->json(['mensagem' => 'Recurso excluído com sucesso']);
        } else {
            return response()->json(['mensagem' => 'Recurso não encontrado'], 404);
        }
    }

    public function store(Request $request)
    {
        $question = $quiz = Quiz::create([
            'title' => $request->input('titulo'),
            'description' => $request->input('descricao'),
        ]);

        $dadosPerguntas = $request->input('perguntas');
        
        foreach ($dadosPerguntas as $dadoPergunta) {
            
            $question = Question::create([
                'quiz_id' => $quiz->id,
                'title' => $dadoPergunta["pergunta"],
            ]);

            foreach ($dadoPergunta["respostas"] as $dadoResposta) {

                Answer::create([
                    'question_id' => $question->id,
                    'text' => $dadoResposta["resposta"],
                    'score' => $dadoResposta["pontuacao"],
                ]);
            }
        }

        Session::flash('success', 'Novo questionário cadastrado com sucesso!');
        return response()->json(['success' => true], 200);
    }
}
