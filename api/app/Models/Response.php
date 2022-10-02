<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['value','questionId', 'respondentId'];

    /**
     * question
     * relationship associate to Question
     */
    public function question() {
        return $this->belongsTo(Question::class, 'questionId');
    }

    /**
     * respondent
     * relationship associate to Respondent
     */
    public function respondent() {
        return $this->belongsTo(Respondent::class, 'respondentId');
    }

    /**
     * getAll
     * return a list of the whole responses
     */ 
    public static function getAll()
    {
        $responses = self::all();
        return $responses;
    }
    /**
     * getByQuestionId
     * return response with the same questionId as the param
     */
    public static function getByQuestionId($idQuestion)
    {
        $responses = self::where('questionId', $idQuestion)->get();
        return $responses;
    }

    /**
     * getByRespondentId
     * return response with the same respondentId as the param
     */
    public static function getByRespondentId($idRespondent)
    {
        $responses = self::where('respondentId',$idRespondent)->get();
        return $responses;
    }
}
