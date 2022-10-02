<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Respondent;
use App\Models\Response;
use ArrayObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\Object_;

use function PHPUnit\Framework\isEmpty;

class ResponseController extends Controller
{

    public function getQuality()
    {
        $allResponses=Response::getAll();

        
        if(count($allResponses)==0){
            return response()->json([
                "message" => "Aucun sondage enregistré"
            ],204);
        }else{
        $questionId = [11, 12, 13, 14, 15];
        $answersAverage = [];
        foreach ($questionId as $id) {
            $averages = Response::where('questionId', $id)->get()->avg('value');
            array_push($answersAverage, $averages);
        }
        return response()->json($answersAverage);
    }
    }

    public function getVrInfos($id)
    {
        $allResponses=Response::getAll();

        
        if(count($allResponses)==0){
            return response()->json([
                "message" => "Responses empty"
            ],204);
        }else{
            $responses = Response::where('questionId', $id)->get();
            $possible_responses = Question::where('id', $id)->get();
            $options = json_decode($possible_responses[0]->choices);
            $stats = [];
    
            foreach ($options as $option) {
    
                $count = 0;
                foreach ($responses as $response) {
                    if ($response->value == $option) {
    
                        $count = $count += 1;
                    }
                }
                array_push($stats, $count);
            }
    
            return response()->json([
                "test"=>$allResponses,
                "labels" => $options,
                "chartDatas" => $stats
            ]);
        }
        
    }
    /**
     * Display a listing of the resource.
     *mù
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $responses = Response::getAll()->groupBy("respondentId");
        if(count($responses)==0){
            return response()->json([
                "message" => "Aucun sondage enregistré"
            ],204);
        }else{
        return response()->json($responses);
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

        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'responses' => 'required',
        ]);
        // Si les paramètres ne conviennent un message d'erreur est renvoyé
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
                'link' => Str::uuid(),
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
        } else {
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
        $responses = Response::getByRespondentId($id);
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
