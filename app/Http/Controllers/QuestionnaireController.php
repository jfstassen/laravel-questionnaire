<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        // preventing someone who is not logged in from accessing this controller
        $this->middleware("auth");
    }

    public function create()
    {
        return view("questionnaire.create");
    }
    public function store()
    {
        $data = request()->validate([
            "title" => "required",
            "purpose" => "required"
        ]);

        // inject the current user id into the data // premiere facon de faire
        // $data["user_id"] = auth()->user()->id;
        // $questionnaire = \App\Questionnaire::create($data);


        //secondaire facon de faire plus clean avec ajout dans model User & model Questionnaire
        $questionnaire = auth()->user()->questionnaires()->create($data);


        return redirect("/questionnaires/" . $questionnaire->id);
    }
    public function show(\App\Questionnaire $questionnaire)
    {
        //lazyloading relationships
        //load the public function question() in questionnaire.php + la function answers()
        $questionnaire->load("questions.answers");
        // dd($questionnaire); 
        return view("questionnaire.show", compact("questionnaire"));
    }
}
