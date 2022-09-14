<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'type',
        'choices',
    ];

    public function responses() {
        return $this->hasMany(Response::class);
    }

    public static function getAll()
    {
        $questions = Question::all();
        return $questions;
    }
}
