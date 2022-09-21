<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::getAll(); //Retrieve all questions from the database 
        if(!$questions) return response()->json(['error' => 'No questions found in database'], 404); //Error if there are no questions
        //if the question's type === 'A' 
        //decode 'choices' before send the response json
        $questionsResponseJson = []; 
        foreach ($questions as $question) {
            if ($question->type === 'A') {
                $JSONItem = [
                    'id' => $question->id,
                    'title' => $question->title,
                    'type' => $question->type,
                    'choices' => json_decode($question->choices),
                ];
            } else {
                $JSONItem = [
                    'id' => $question->id,
                    'title' => $question->title,
                    'type' => $question->type,
                ];
            }
            array_push($questionsResponseJson, $JSONItem);
            
        }
        return response()->json($questionsResponseJson, 200); //Return a json response
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
