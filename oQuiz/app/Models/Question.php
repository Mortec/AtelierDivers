<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Question extends Model
{


    protected $table = 'question';



    public function quiz()
    {

        return $this->belongsTo('App\Models\Quiz', 'quiz_id');
    }



    public function level()
    {

        return $this->belongsTo('App\Models\Level', 'level_id');
    }




    public function goodanswer()
    {

        return $this->belongsTo('App\Models\Answer', 'answer_id');
    }




    public function answers()
    {
        return $this->hasMany('App\Models\Answer', 'question_id');
    }
}