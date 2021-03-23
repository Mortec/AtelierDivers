<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{



    protected $table = 'tag';



    public function quizzes()
    {

        return $this->belongsToMany('App\Models\Quiz')->using('App\Models\QuizTag');
    }
}