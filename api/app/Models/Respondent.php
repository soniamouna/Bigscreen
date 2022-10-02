<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respondent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['email','link'];

    /**
     * responses
     * relationship associate to Response
     */
    public function responses() {
        return $this->hasMany(Response::class);
    }

    /**
     * getAll
     * return a list of the whole respondents
     */ 
    public static function getAll()
    {
        $respondents = self::all();
        return $respondents;
    }

    /**
     * getByLink
     * return respondent with the same link as the param
     */
    public static function getByLink($link) 
    {
        return self::where('link', $link)->first();
    }

    /**
     * getById
     * return respondent with the same id as the param
     */
    public static function getById($id)
    {
        $respondent = self::where('id',$id)->first();
        return $respondent;
    }

    /**
     * getByEmail
     * return respondent with the same email as the param
     */
    public static function getByEmail($email)
    {
        $respondent = self::where('email',$email)->first();
        return $respondent;
    }
}