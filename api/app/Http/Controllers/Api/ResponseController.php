<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Respondent;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *mù
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responses=Response::getAll(); // Get the responses'list in database
        return response()->json($responses); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $email=$request->email; //Get the email from the request 
        $responses=$request->responses;//Get the responses from the request 

        $questions = Question::getAll(); //Get all the questions
        $repondentEmail=Respondent::getByEmail($email); // Get the respondent by the email

        //Create a new Respondent if the email doesn't appear in the database respondents
        if ($repondentEmail == null) {
            $newRespondent = Respondent::create([
              'email' => $email,
              'link' => Str::uuid(),
            ]);
            $newRespondent->save();
            foreach ($questions as $key => $question) { // Create a new Response foreach question 
                Response::create([
                    'value' => $responses[$key],
                    'questionId' => $question->id,
                    'respondentId' => $newRespondent->id,
                ]);
            }
        }
       
        $link = $newRespondent->link;
        return response()->json([
            'message' => 'New survey created',
            'code' => 200,
            'link'=> $link
        ]);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $responses=Response::getByRespondentId($id);
        return response()->json($responses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Response $response)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function destroy(Response $response)
    {
        //
    }
}
