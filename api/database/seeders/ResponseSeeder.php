<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Respondent;
use App\Models\Response;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create 10 Respondents and insert them in the database
        Respondent::factory(10)->create()->each(function ($respondent) {
            $faker = Faker::create(); //
            $questions = Question::getAll(); //get the whole questions
            /**
             * for each question, depending on the type of question, 
             * save the response and the respondent in the database
             */
            foreach ($questions as $question) {
                switch ($question->type) {
                        /**
                     * if the question is of type A, 
                     * create an response with as value one of 
                     * the choices of the question
                     */
                    case 'A':
                        $choices = json_decode($question->choices); //get choices'question
                        $value = $choices[rand(0, count($choices) - 1)]; //get a random choice 
                        $newResponse = Response::create([
                            'value' => $value,
                            'questionId' => $question->id,
                            'respondentId' => $respondent->id,

                        ]);
                        break;
                        /** if the question is type B, 
                         * record the response with a paragraph 
                         * that will contain a maximum of 6 sentences
                         */
                    case 'B':
                        $choices = $faker->sentence(6); // get a paragraph that will contain a maximum 6 sentences
                        $newResponse = Response::create([
                            'value' => $choices,
                            'questionId' => $question->id,
                            'respondentId' => $respondent->id,

                        ]);
                        break;
                        /** if the question is type C, 
                         * record the response with a value 
                         * equal to a number between 1 and 5
                         */
                    case 'C':
                        $choices = rand(1, 5); //get a random number between 1 and 5
                        $newResponse = Response::create([
                            'value' => $choices,
                            'questionId' => $question->id,
                            'respondentId' => $respondent->id,

                        ]);
                        break;
                    default:
                        break;
                }
                $newResponse->save(); // save the response into the database
            }
            $respondent->save(); // save the respondent into the database
        });
    }
}
