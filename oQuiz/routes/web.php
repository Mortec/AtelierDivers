<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//Acces simple et rapide aux tables de la base de données
// Route::get('/ask/{asked}', ['as' => 'ask', function( $asked ) {
    
//     return response()->json( DB::select('SELECT * FROM '. $asked) );
// }]);


Route::get('/', ['as' => 'home', 'uses' => 'MainController@home'] );
Route::get('/home', ['as' => 'homebis', 'uses' => 'MainController@home'] );

Route::get('/sign', ['as' => 'sign', 'uses' => 'UserController@sign'] );

Route::post('/signup', ['as' => 'signup', 'uses' => 'UserController@signup'] );
Route::post('/signin', ['as' => 'signin', 'uses' => 'UserController@signin']);

Route::get('/quiz/{id}', ['as' => 'quiz', 'uses' => 'QuizController@quiz'] );
Route::get('/quiz/{id}/play', ['as' => 'play', 'uses' => 'QuizController@play'] );
Route::post('/quiz/{id}', ['as' => 'score', 'uses' => 'QuizController@score'] );
Route::get('/quiz/{id}/mail', ['as' => 'mailscore', 'uses' => 'QuizController@mailscore'] );

Route::get('/tags', ['as' => 'tags', 'uses' => 'TagController@tags'] );
Route::get('/tags/{id}/quiz', ['as' => 'tagquiz', 'uses' => 'TagController@tagQuiz'] );

Route::get('/account', ['as' => 'account', 'uses' => 'UserController@account']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'UserController@logout']);
