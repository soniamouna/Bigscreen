<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = ['value','questionId', 'respondentId'];

    public function question() {
        return $this->belongsTo(Question::class);
    }

    public function respondent() {
        return $this->belongsTo(Respondent::class);
    }
    

   
}
