<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Utils\UserSession;
use App\Utils\Mailer;
use Illuminate\Http\Request;


class QuizController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { }


    public function quiz($id)
    {

        if ( UserSession::isConnected() ) return redirect()->route('play', ['id'=>$id] );

        else {

        $quiz = Quiz::find($id);
        $tags = $quiz->tags;
        $questions = $quiz->questions->where('status', 1);

        return view('quiz', ['quiz' => $quiz, 'tags' => $tags, 'questions' => $questions] );
        }
    }


    public function play($id)
    {

        $quiz = Quiz::find($id);
        $tags = $quiz->tags;
        $questions = $quiz->questions->where('status', 1);

        return view('play', ['quiz' => $quiz, 'tags' => $tags, 'questions' => $questions]);
    }



    public function score( Request $request, $id)
    {   

        $form = $request->all();

        $quiz = Quiz::find($id);
        $questions = $quiz->questions->where('status', 1);
        $user_answersIds = [];
        $tags = $quiz->tags;
        $score = 0;

        foreach ($questions as $n => $question) {

            if ( $form[ $question->id ] && true ) array_push($user_answersIds, $form[ $question->id ]);
            else array_push($user_answersIds, 0 );

            if ( $question->answer_id == $user_answersIds[$n] ) $score++ ;
        }

        $scoredatas = ['quiz' => $quiz, 'tags' => $tags, 'score' => $score, 'questions' => $questions, 'user_answersIds' => $user_answersIds ];

        UserSession::setScore( $scoredatas);

        return view( 'score', $scoredatas );
    }

    public function mailscore($id)
    {
        extract( UserSession::getScore() );
        ob_start();
        require __DIR__.'./../../../resources/views/scoremail.php';
        $html = ob_get_contents();
        ob_end_clean();

        Mailer::mailscore( $html );

        return redirect()->route('home');
    }

}
