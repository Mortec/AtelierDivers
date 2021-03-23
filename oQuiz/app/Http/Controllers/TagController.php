<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    

    public function tagQuiz( $id ) {

        $tag = Tag::find( $id );
        $quizzes = $tag->quizzes->where('status', 1 );
        $tags = Tag::All();

        return view('tagquiz', [ 'tag'=>$tag,  'quizzes' => $quizzes, 'tags' => $tags ] );
    }

    
}
