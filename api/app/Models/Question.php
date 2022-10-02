<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'title',
        'type',
        'choices',
    ];

    /**
     * responses
     * relationship associate to Response
     */
    public function responses() { 
        return $this->hasMany(Response::class);
    }

    /**
     * getAll
     * return a list of the whole questions
     */ 
    public static function getAll()
    {
        $questions = self::all();
        return $questions;
    }

    /**
     * getById
     * return question with the same id as the param
     */
    public static function getById($id)
    {
        $question = self::where('id',$id)->first();
        return $question;
    }
}
