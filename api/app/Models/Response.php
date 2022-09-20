<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = ['value','questionId', 'respondentId'];

    public function question() {
        return $this->belongsTo(Question::class, 'questionId');
    }

    public function respondent() {
        return $this->belongsTo(Respondent::class, 'respondentId');
    }

    public static function getAll()
    {
        $responses = self::all();
        return $responses;
    }

    public static function getByRespondentId($idRespondent)
    {
        $responses = self::all()->where('respondentId',$idRespondent);
        return $responses;
    }
    

   
}
