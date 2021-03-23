<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'level';


    public function questions()
    {

        return $this -> hasMany('App\Models\Question', 'level_id');
    }
}