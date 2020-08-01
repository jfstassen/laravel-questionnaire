<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(\App\Questionnaire $questionnaire)
    {
        return view("question.create", compact("questionnaire"));
    }
    public function store(\App\Questionnaire $questionnaire)
    {
        // dd(request()->all());
        $data = request()->validate([
            "question.question" => "required",
            "answers.*.answer" => "required"
        ]);

        $question = $questionnaire->questions()->create($data["question"]);
        $question->answers()->createMany($data["answers"]);

        return redirect("/questionnaires/" . $questionnaire->id);
    }
    public function destroy(Questionnaire $questionnaire, Question $question)
    {
        // dd($question->answers);
        //delete les reponses de la question
        $question->answers()->delete();
        //delete la question
        $question->delete();

        return redirect($questionnaire->path());
        // $question = request()->question_id;

        // dd($questionnaire->questions()->find($question)->answers);
        // dd(request()->all());
        // dd($question);

    }
}
