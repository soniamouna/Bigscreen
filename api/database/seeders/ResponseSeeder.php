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
        Respondent::factory(10)->create()->each(function ($respondent) {
            $faker = Faker::create();
            $questions = Question::getAll();
            foreach ($questions as $key => $question) {
                switch ($question->type) {
                    case 'A':
                        $choices = json_decode($question->choices);
                        $value = $choices[rand(0, count($choices) - 1)];
                        $newResponse = Response::create([
                            'value' => $value,
                            'questionId' => $question->id,
                            'respondentId' => $respondent->id,

                        ]);
                        break;
                    case 'B':
                        $choices = $faker->sentence(6);
                        $newResponse = Response::create([
                            'value' => $choices,
                            'questionId' => $question->id,
                            'respondentId' => $respondent->id,

                        ]);
                        break;
                    case 'C':
                        $choices = rand(1, 5);
                        $newResponse = Response::create([
                            'value' => $choices,
                            'questionId' => $question->id,
                            'respondentId' => $respondent->id,

                        ]);
                        break;
                    default:
                        break;
                }
                $newResponse->save();
            }
            $respondent->save();
        });
    }
}
