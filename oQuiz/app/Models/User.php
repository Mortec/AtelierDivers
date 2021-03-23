<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{


    protected $table = 'user';


    public function quizzes()
    {

        return $this->hasMany('App\Models\Quiz', 'user_id');
    }
}