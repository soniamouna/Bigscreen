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
        $respondents = Respondent::all();
        
        return $respondents;
    }

    public static function getByLink($link) {
        return self::where('link', $link)->first();
    }
    public static function getById($id)
    {
        $respondent = self::where('id',$id)->first();
        return $respondent;
    }
    public static function getByEmail($email)
    {
        $respondent = self::where('email',$email)->first();
        return $respondent;
    }
}
