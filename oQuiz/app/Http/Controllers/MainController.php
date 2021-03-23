<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Quiz;
use Illuminate\Http\Request;




class MainController extends Controller
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


    public function home() {

        $quizzes = Quiz::where('status', 1 )->get();

        //return response()->json( $quizzes );

        $tags = Tag::All();

        return view('home', [ 'quizzes' => $quizzes, 'tags' => $tags ] );
    }

    //
}
