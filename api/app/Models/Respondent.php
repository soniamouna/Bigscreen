<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respondent extends Model
{
    use HasFactory;

    protected $fillable = ['email','link'];

    public function responses() {
        return $this->hasMany(Response::class);
    }

    public static function getAll(): object
    {
        $respondents = Response::all();
        
        return $respondents;
    }

    public static function getByLink($link) {
        return Respondent::with(['responses'])->where('link', $link)->first();
    }
}
