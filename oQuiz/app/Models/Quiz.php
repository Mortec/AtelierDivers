<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    protected $table = 'quiz';




    public function user()//user_author
    {

        return $this->belongsTo('App\Models\User', 'user_id');
    }



    public function tags()
    {

        return $this->belongsToMany('App\Models\Tag')->using('App\Models\QuizTag');
    }



    public function questions()
    {

        return $this->hasMany('App\Models\Question', 'quiz_id');
    }
}