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
    // Return a response with the different response's average (for the question 11 to 15)
    public function getQuality()
    {
        $allResponses = Response::getAll(); // Get the whole responses
        // if there is no response in the database <=> no poll completed by an user
        if (count($allResponses) == 0) {
            return response()->json([
                "message" => "Aucun sondage enregistré" // return a message
            ], 204);
        } else { // if Response isn't empty
            $questionIds = [11, 12, 13, 14, 15];
            $responsesAverage = [];
            // get the different responses'average to the question 11 to 15
            foreach ($questionIds as $id) {
                $averages = Response::where('questionId', $id)->get()->avg('value');
                array_push($responsesAverage, $averages);
            }
            return response()->json($responsesAverage);
        }
    }

    // Return a response with the numbers of times where a choice was selected by the different users
    public function getVrInfos($id)
    {
        $allResponses = Response::getAll(); // Get the whole responses
        // if there is no response in the database <=> no poll completed by an user
        if (count($allResponses) == 0) {
            return response()->json([
                "message" => "Aucun sondage enregistré" // return a message
            ], 204);
        } else {
            $responses = Response::getByQuestionId($id); //get all responses by question's id
            $question = Question::getById($id); // get question by question's id
            $options = json_decode($question->choices); // get question's choices
            $stats = [];

            foreach ($options as $option) {

                $count = 0;
                foreach ($responses as $response) {
                    // if the choice was selected by an user -> increment $count
                    if ($response->value == $option) {

                        $count = $count += 1;
                    }
                }
                array_push($stats, $count);
            }

            return response()->json([ // return response with labels and numbers of times where a choice was selected
                "labels" => $options,
                "chartDatas" => $stats
            ], 200);
        }
    }
    /**
     * Display a listing of the resource group by 'respondentId'.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $responses = Response::getAll()->groupBy("respondentId");
        if (count($responses) == 0) {
            return response()->json([
                "message" => "Aucun sondage enregistré" // if it's empty return this message
            ], 204);
        } else {
            return response()->json($responses); // otherwise return the whole responses
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // check if the email is valid and if the request parameters are not empty
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'responses' => 'required',
        ]);
        // If the parameters are not suitable an error message is returned
        if ($validate->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validate->errors()], 422);
        }
        $email = $request->email; //Get the email from the request 
        $responses = $request->responses; //Get the responses from the request 

        $questions = Question::getAll(); //Get all the questions
        $repondentEmail = Respondent::getByEmail($email); // Get the respondent by the email

        //Create a new Respondent if the email doesn't appear in the database respondents
        if ($repondentEmail === null) {
            $newRespondent = Respondent::create([
                'email' => $email,
                'link' => Str::uuid(), //unique identifier
            ]);
            $newRespondent->save();
            foreach ($questions as $key => $question) { // Create a new Response foreach question 
                Response::create([
                    'value' => $responses[$key + 1],
                    'questionId' => $question->id,
                    'respondentId' => $newRespondent->id,
                ]);
            }
            $link = $newRespondent->link;
            return response()->json(['message' => 'New poll and respondent created', 'link' => $link], 200);
        } else { // error if the email already exist in the database
            return response()->json(['message' => "Cet email existe déjà. Veuillez saisir un autre email.", 'errors' => 'Respondent already exists'], 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $responses = Response::getByRespondentId($id); //get the response by the respondent's id
        if ($responses == null) {
            return response()->json([
                'error' => "Unauthorized. No respondent matches in database",
            ], 401);
        } else {
            return response()->json([
                'responses' => $responses
            ], 200);
        }
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
